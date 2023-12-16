<?php

namespace App\Observers;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     */
    public function created(Book $book): void
    {
        //
    }

    /**
     * Handle the Book "updated" event.
     */
    public function updated(Book $book): void
    {
        if ($book->isDirty("img") && $book->getOriginal("img") !== null) {
            Storage::disk("public")->delete($book->getOriginal("img"));
        }
    }

    /**
     * Handle the Book "deleted" event.
     */
    public function deleted(Book $book): void
    {
        if (!is_null($book->img)) {
            Storage::disk("public")->delete($book->img);
        }
    }

    /**
     * Handle the Book "restored" event.
     */
    public function restored(Book $book): void
    {
        //
    }

    /**
     * Handle the Book "force deleted" event.
     */
    public function forceDeleted(Book $book): void
    {
        //
    }
}
