<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideosCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'name_ar',
        'description_ar',
    ];

    public function video(): HasMany
    {
        return $this->hasMany(Videos::class);
    }
}
