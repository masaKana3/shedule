<?php

namespace Tests\Feature;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase; // テストごとにデータベースをリセット

    /** @test */
    public function スケジュール一覧を取得できる()
    {
        $user = User::factory()->create();
        Schedule::factory(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/schedules');

        $response->assertStatus(200);
        $response->assertSee('スケジュール一覧');
    }

    /** @test */
    public function スケジュールを作成できる()
    {
        $user = User::factory()->create();

        $scheduleData = [
            'title' => 'テストスケジュール',
            'description' => 'テストの説明',
            'start_time' => now()->addDay(),
            'end_time' => now()->addDays(2),
        ];

        $response = $this->actingAs($user)->post('/schedules', $scheduleData);

        $response->assertRedirect('/schedules');
        $this->assertDatabaseHas('schedules', ['title' => 'テストスケジュール']);
    }

    /** @test */
    public function スケジュールの詳細を表示できる()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get("/schedules/{$schedule->id}");

        $response->assertStatus(200);
        $response->assertSee($schedule->title);
    }

    /** @test */
    public function スケジュールを更新できる()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create(['user_id' => $user->id]);

        $updatedData = [
            'title' => '更新されたスケジュール',
            'start_time' => now()->addDays(3),
            'end_time' => now()->addDays(4),
        ];

        $response = $this->actingAs($user)->put("/schedules/{$schedule->id}", $updatedData);

        $response->assertRedirect('/schedules');
        $this->assertDatabaseHas('schedules', ['title' => '更新されたスケジュール']);
    }

    /** @test */
    public function スケジュールを削除できる()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/schedules/{$schedule->id}");

        $response->assertRedirect('/schedules');
        $this->assertDatabaseMissing('schedules', ['id' => $schedule->id]);
    }
}
