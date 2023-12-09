<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;

    protected $fillable = [
        'h1',
        'p',
        'sh1',
        'sh2',
        'sh3',
        'sh4',
        'phone',
        'img'
    ];
}
