<?php

namespace App\Observers;

use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselObserver
{
    /**
     * Handle the Carousel "created" event.
     */
    public function created(Carousel $carousel): void
    {
        //
    }

    /**
     * Handle the Carousel "updated" event.
     */
    public function updated(Carousel $carousel): void
    {
        if ($carousel->isDirty("img") && $carousel->getOriginal("img") !== null) {
            Storage::disk("public")->delete($carousel->getOriginal("img"));
        }
    }

    /**
     * Handle the Carousel "deleted" event.
     */
    public function deleted(Carousel $carousel): void
    {
        if (!is_null($carousel->img)) {
            Storage::disk("public")->delete($carousel->img);
        }
    }

    /**
     * Handle the Carousel "restored" event.
     */
    public function restored(Carousel $carousel): void
    {
        //
    }

    /**
     * Handle the Carousel "force deleted" event.
     */
    public function forceDeleted(Carousel $carousel): void
    {
        //
    }
}
