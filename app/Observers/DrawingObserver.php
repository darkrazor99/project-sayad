<?php

namespace App\Observers;

use App\Models\Drawing;
use Illuminate\Support\Facades\Storage;

class DrawingObserver
{
    /**
     * Handle the Drawing "created" event.
     */
    public function created(Drawing $drawing): void
    {
        //
    }

    /**
     * Handle the Drawing "updated" event.
     */
    public function updated(Drawing $drawing): void
    {
        if ($drawing->isDirty("img") && $drawing->getOriginal("img") !== null) {
            Storage::disk("public")->delete($drawing->getOriginal("img"));
        }
    }

    /**
     * Handle the Drawing "deleted" event.
     */
    public function deleted(Drawing $drawing): void
    {
        if (!is_null($drawing->img)) {
            Storage::disk("public")->delete($drawing->img);
        }
    }

    /**
     * Handle the Drawing "restored" event.
     */
    public function restored(Drawing $drawing): void
    {
        //
    }

    /**
     * Handle the Drawing "force deleted" event.
     */
    public function forceDeleted(Drawing $drawing): void
    {
        //
    }
}
