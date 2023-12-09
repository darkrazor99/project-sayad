<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BasicArtical extends Model
{
    use HasFactory;
    protected $fillable = [
        'header',
        'body',
        'img',
        'category_id',
        'pdf',
        'video',
        'shortDesc',
        'hasVid',
        'hasPdf',
        'isArabic',
        'published_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
