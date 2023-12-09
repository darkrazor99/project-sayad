<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'mainh1',
        'mainh2',
        'subh1',
        'p1',
        'subh2',
        'p2',
        'subh3',
        'p3',
        'subh4',
        'p4',
        'mainh1-ar',
        'mainh2-ar',
        'subh1-ar',
        'p1-ar',
        'subh2-ar',
        'p2-ar',
        'subh3-ar',
        'p3-ar',
        'subh4-ar',
        'p4-ar',
    ];
}
