<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class SendWelcomeEmaillistner
{
    /**
     * Create the event listener.
     */
    public $adddata;
    public $useraccess;

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $adddata = $event->adddata;
        $useraccess = $event->useraccess;
        SendWelcomeEmail::dispatch($adddata ,$useraccess);
        // Mail::to($event->userdata->email)->send(new WelcomeEmail($event->userdata, $event->useraccess));
    }
}
