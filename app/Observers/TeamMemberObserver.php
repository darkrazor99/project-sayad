<?php

namespace App\Observers;

use App\Models\TeamMember;
use Illuminate\Support\Facades\Storage;

class TeamMemberObserver
{
    /**
     * Handle the TeamMember "created" event.
     */
    public function created(TeamMember $teamMember): void
    {
        //
    }

    /**
     * Handle the TeamMember "updated" event.
     */
    public function updated(TeamMember $teamMember): void
    {
        if ($teamMember->isDirty("img") && $teamMember->getOriginal("img") !== null) {
            Storage::disk("public")->delete($teamMember->getOriginal("img"));
        }
    }

    /**
     * Handle the TeamMember "deleted" event.
     */
    public function deleted(TeamMember $teamMember): void
    {
        if(! is_null($teamMember->img)) {
            Storage::disk("public")->delete($teamMember->img);
        }
    }

    /**
     * Handle the TeamMember "restored" event.
     */
    public function restored(TeamMember $teamMember): void
    {
        //
    }

    /**
     * Handle the TeamMember "force deleted" event.
     */
    public function forceDeleted(TeamMember $teamMember): void
    {
        //
    }
}
