<?php

namespace App\Observers;

use App\Models\Pdf;
use Illuminate\Support\Facades\Storage;

class PdfObserver
{
    /**
     * Handle the Pdf "created" event.
     */
    public function created(Pdf $pdf): void
    {
        //
    }

    /**
     * Handle the Pdf "updated" event.
     */
    public function updated(Pdf $pdf): void
    {
        if ($pdf->isDirty("img") && $pdf->getOriginal("img") !== null) {
            Storage::disk("public")->delete($pdf->getOriginal("img"));
        }
        if ($pdf->isDirty("pdf") && $pdf->getOriginal("pdf") !== null) {
            Storage::disk("public")->delete($pdf->getOriginal("pdf"));
        }
    }

    /**
     * Handle the Pdf "deleted" event.
     */
    public function deleted(Pdf $pdf): void
    {
        if (!is_null($pdf->img)) {
            Storage::disk("public")->delete($pdf->img);
        }
        if (!is_null($pdf->pdf)) {
            Storage::disk("public")->delete($pdf->pdf);
        }
    }

    /**
     * Handle the Pdf "restored" event.
     */
    public function restored(Pdf $pdf): void
    {
        //
    }

    /**
     * Handle the Pdf "force deleted" event.
     */
    public function forceDeleted(Pdf $pdf): void
    {
        //
    }
}
