<?php

namespace App\Observers;

use App\Models\Videos;
use Illuminate\Support\Facades\Storage;

class VideosObserver
{
    /**
     * Handle the Videos "created" event.
     */
    public function created(Videos $videos): void
    {
        //
    }

    /**
     * Handle the Videos "updated" event.
     */
    public function updated(Videos $videos): void
    {
        if ($videos->isDirty("img") && $videos->getOriginal("img") !== null) {
            Storage::disk("public")->delete($videos->getOriginal("img"));
        }

        if ($videos->isDirty("vid") && $videos->getOriginal("vid") !== null) {
            Storage::disk("public")->delete($videos->getOriginal("vid"));
        }
    }

    /**
     * Handle the Videos "deleted" event.
     */
    public function deleted(Videos $videos): void
    {
        if (!is_null($videos->img)) {
            Storage::disk("public")->delete($videos->img);
        }

        if (!is_null($videos->vid)) {
            Storage::disk("public")->delete($videos->vid);
        }
    }

    /**
     * Handle the Videos "restored" event.
     */
    public function restored(Videos $videos): void
    {
        //
    }

    /**
     * Handle the Videos "force deleted" event.
     */
    public function forceDeleted(Videos $videos): void
    {
        //
    }
}
