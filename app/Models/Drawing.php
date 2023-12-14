<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drawing extends Model
{
    use HasFactory;
    protected $fillable = [
        'header',
        'body',
        'img',
        'categories_id',
        'shortDesc',
        'published_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DrawingCategory::class);
    }

}
