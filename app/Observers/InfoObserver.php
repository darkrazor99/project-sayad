<?php

namespace App\Observers;

use App\Models\Info;
use Illuminate\Support\Facades\Storage;

class InfoObserver
{
    /**
     * Handle the Info "created" event.
     */
    public function created(Info $info): void
    {
        //
    }

    /**
     * Handle the Info "updated" event.
     */
    public function updated(Info $info): void
    {
        if ($info->isDirty("img") && $info->getOriginal("img") !== null) {
            Storage::disk("public")->delete($info->getOriginal("img"));
        }
    }

    /**
     * Handle the Info "deleted" event.
     */
    public function deleted(Info $info): void
    {
        //
    }

    /**
     * Handle the Info "restored" event.
     */
    public function restored(Info $info): void
    {
        //
    }

    /**
     * Handle the Info "force deleted" event.
     */
    public function forceDeleted(Info $info): void
    {
        //
    }
}
