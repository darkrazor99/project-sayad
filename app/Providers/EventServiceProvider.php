<?php

namespace App\Providers;

use App\Models\Info;
use App\Models\Carousel;
use App\Models\PdfArtical;
use App\Models\TeamMember;
use App\Models\BasicArtical;
use App\Models\VideoArtical;
use App\Observers\InfoObserver;
use App\Observers\CarouselObserver;
use App\Observers\PdfArticalObserver;
use App\Observers\TeamMemberObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\BasicArticalObserver;
use App\Observers\VideoArticalObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        BasicArtical::observe(BasicArticalObserver::class);
        Carousel::observe(CarouselObserver::class);
        Info::observe(InfoObserver::class);
        TeamMember::observe(TeamMemberObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
