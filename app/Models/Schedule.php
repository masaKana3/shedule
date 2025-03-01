<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ← 追加
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory; // ← 追加

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_time',
        'end_time',
    ];
}
