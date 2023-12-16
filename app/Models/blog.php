<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'header',
        'body',
        'img',
        'category_id',
        'shortDesc',
        'published_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(blogCategory::class);
    }
}
