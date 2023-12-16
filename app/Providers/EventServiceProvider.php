<?php

namespace App\Providers;

use App\Models\blog;
use App\Models\Book;
use App\Models\Drawing;
use App\Models\Info;
use App\Models\Carousel;
use App\Models\Pdf;
use App\Models\TeamMember;
use App\Models\BasicArtical;
use App\Models\Videos;
use App\Observers\blogObserver;
use App\Observers\BookObserver;
use App\Observers\DrawingObserver;
use App\Observers\InfoObserver;
use App\Observers\CarouselObserver;
use App\Observers\PdfObserver;
use App\Observers\TeamMemberObserver;
use App\Observers\VideosObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\BasicArticalObserver;
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
        blog::observe(blogObserver::class);
        Book::observe(BookObserver::class);
        Drawing::observe(DrawingObserver::class);
        Pdf::observe(PdfObserver::class);
        Videos::observe(VideosObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
