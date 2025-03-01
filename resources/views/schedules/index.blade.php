<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('スケジュール一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">スケジュール一覧</h3>
                    
                    {{-- スケジュール一覧の表示 --}}
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border px-4 py-2">タイトル</th>
                                <th class="border px-4 py-2">開始日時</th>
                                <th class="border px-4 py-2">終了日時</th>
                                <th class="border px-4 py-2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="border px-4 py-2">{{ $schedule->title }}</td>
                                    <td class="border px-4 py-2">{{ $schedule->start_time }}</td>
                                    <td class="border px-4 py-2">{{ $schedule->end_time }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('schedules.show', $schedule->id) }}" class="text-blue-500">詳細</a> |
                                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="text-green-500">編集</a> |
                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500" onclick="return confirm('本当に削除しますか？')">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- スケジュール作成ボタン --}}
                    <div class="mt-4">
                        <a href="{{ route('schedules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">スケジュールを追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
