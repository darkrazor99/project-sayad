<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BasicArtical extends Model
{
    use HasFactory;
    protected $fillable = [
        'header',
        'body',
        'img',
        'book_id',
        'shortDesc',
        'published_at'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
