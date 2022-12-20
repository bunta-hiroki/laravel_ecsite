<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // DBのテーブル名を指定
    protected $table = 'blogs';

    // 可変項目を指定
    protected $fillable = 
    [
        'title',
        'content',
    ];

}
