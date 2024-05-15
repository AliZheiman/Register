<?php

namespace App\Providers;

use App\Providers\RegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailVerifyListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterEvent $event): void
    {
        //
    }
}
