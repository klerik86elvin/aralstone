<?php

namespace App\Listeners;

use App\Events\ProductOrderEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\ProductOrderJob;

class ProductOrderListener
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
     * @param  \App\Events\ProductOrderEvent  $event
     * @return void
     */
    public function handle(ProductOrderEvent $event)
    {
        ProductOrderJob::dispatch($event->data);
    }
}
