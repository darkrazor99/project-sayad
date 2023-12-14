<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class blogCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'name_ar',
        'description_ar',
    ];

    public function BasicArtical(): HasMany
    {
        return $this->hasMany(blog::class);
    }
}
