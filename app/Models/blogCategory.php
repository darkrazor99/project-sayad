<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'name_ar',
        'description_ar',
    ];

    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
