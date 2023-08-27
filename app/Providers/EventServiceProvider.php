<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ObatEvent;
use App\Listeners\ObatEventListener;
use App\Events\ObatCreated ;
use App\Events\ObatUpdated;
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
    //      ObatCreated::class => [
    //     ObatEventListener::class,
    // ],
    // ObatUpdated::class => [
    //     ObatEventListener::class,
    // ],
    ];

    /**
     * Register any events for your application.
     */
    // public function boot(): void
    // {
    //     //
    // }
    public function boot()
    {
        parent::boot();

        // ...
    }
    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
    // app/Providers/EventServiceProvider.php

    // protected $listen = [
        
    // ];

}
