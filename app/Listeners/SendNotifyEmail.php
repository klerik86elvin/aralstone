<?php

namespace App\Listeners;

use App\Events\SendContactForm;
use App\Jobs\SendContactFormJob;
use App\Models\ContactUs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotifyEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendContactForm  $event
     * @return void
     */
    public function handle(SendContactForm $event)
    {
        SendContactFormJob::dispatch($event->data);
    }
}
