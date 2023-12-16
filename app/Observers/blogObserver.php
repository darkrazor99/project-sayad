<?php

namespace App\Observers;

use App\Models\blog;
use Illuminate\Support\Facades\Storage;

class blogObserver
{
    /**
     * Handle the blog "created" event.
     */
    public function created(blog $blog): void
    {
        //
    }

    /**
     * Handle the blog "updated" event.
     */
    public function updated(blog $blog): void
    {
        if ($blog->isDirty("img") && $blog->getOriginal("img") !== null) {
            Storage::disk("public")->delete($blog->getOriginal("img"));
        }

    }

    /**
     * Handle the blog "deleted" event.
     */
    public function deleted(blog $blog): void
    {
        if (!is_null($blog->img)) {
            Storage::disk("public")->delete($blog->img);
        }
    }

    /**
     * Handle the blog "restored" event.
     */
    public function restored(blog $blog): void
    {
        //
    }

    /**
     * Handle the blog "force deleted" event.
     */
    public function forceDeleted(blog $blog): void
    {
        //
    }
}
