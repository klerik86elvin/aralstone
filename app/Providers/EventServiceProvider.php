<?php

namespace App\Providers;

use App\Events\SendContactForm;
use App\Listeners\SendNotifyEmail;
use App\Events\ProductOrderEvent;
use App\Listeners\ProductOrderListener;
use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendContactForm::class => [
            SendNotifyEmail::class,
        ],
        ProductOrderEvent::class => [
            ProductOrderListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
