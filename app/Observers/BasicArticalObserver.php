<?php

namespace App\Observers;

use App\Models\BasicArtical;
use Illuminate\Support\Facades\Storage;

class BasicArticalObserver
{
    /**
     * Handle the BasicArtical "created" event.
     */
    public function created(BasicArtical $basicArtical): void
    {
        //
    }

    /**
     * Handle the BasicArtical "updated" event.
     */
    public function updated(BasicArtical $basicArtical): void
    {
        if ($basicArtical->isDirty("img") && $basicArtical->getOriginal("img") !== null) {
            Storage::disk("public")->delete($basicArtical->getOriginal("img"));
        }
        if ($basicArtical->isDirty("pdf") && $basicArtical->getOriginal("pdf") !== null) {
            Storage::disk("public")->delete($basicArtical->getOriginal("pdf"));
        }
        if ($basicArtical->isDirty("video") && $basicArtical->getOriginal("video") !== null) {
            Storage::disk("public")->delete($basicArtical->getOriginal("video"));
        }
    }

    /**
     * Handle the BasicArtical "deleted" event.
     */
    public function deleted(BasicArtical $basicArtical): void
    {
        if (!is_null($basicArtical->img)) {
            Storage::disk("public")->delete($basicArtical->img);
        }
        if (!is_null($basicArtical->pdf)) {
            Storage::disk("public")->delete($basicArtical->pdf);
        }
        if (!is_null($basicArtical->video)) {
            Storage::disk("public")->delete($basicArtical->video);
        }
    }

    /**
     * Handle the BasicArtical "restored" event.
     */
    public function restored(BasicArtical $basicArtical): void
    {
        //
    }

    /**
     * Handle the BasicArtical "force deleted" event.
     */
    public function forceDeleted(BasicArtical $basicArtical): void
    {
        //
    }
}
