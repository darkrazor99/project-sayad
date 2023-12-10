<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'small',
        'mainh1',
        's1',
        'p1',
        's2',
        'p2',
        's3',
        'p3',
        's4',
        'p4',
        's5',
        'p5',
        'mainphone',
        'p6',
        'small_ar',
        'mainh1_ar',
        's1_ar',
        'p1_ar',
        's2_ar',
        'p2_ar',
        's3_ar',
        'p3_ar',
        's4_ar',
        'p4_ar',
        's5_ar',
        'p5_ar',
        'mainphone_ar',
        'p6_ar',
    ];
}
