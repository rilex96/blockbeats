<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'bpm',
        'song_file',
        'image_file',
        'user_id'
    ];
}
