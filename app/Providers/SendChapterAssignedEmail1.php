<?php

namespace App\Providers;

use App\Providers\ChaperAssigned1;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChapterAssignedEmail1
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
    public function handle(ChaperAssigned1 $event): void
    {
        //
    }
}
