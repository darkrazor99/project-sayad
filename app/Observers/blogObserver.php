<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogObserver
{
    /**
     * Handle the blog "created" event.
     */
    public function created(Blog $blog): void
    {
        //
    }

    /**
     * Handle the blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        if ($blog->isDirty("img") && $blog->getOriginal("img") !== null) {
            Storage::disk("public")->delete($blog->getOriginal("img"));
        }

    }

    /**
     * Handle the blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        if (!is_null($blog->img)) {
            Storage::disk("public")->delete($blog->img);
        }
    }

    /**
     * Handle the blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        //
    }

    /**
     * Handle the blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        //
    }
}
