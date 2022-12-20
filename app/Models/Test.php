<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'content'
    ];

    public function shop() 
    {
        return $this->hasOne(Shop::class);
    }


    // public function practice()
    // {
    //     return $this->belongsTo(Practice::class);
    // }

}
