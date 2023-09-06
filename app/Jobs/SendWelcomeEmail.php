<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use App\Models\UserAccessType;
use App\Models\Userdata;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $adddata;
    public $useraccess;
    public function __construct($adddata ,$useraccess)
    {
        $this->adddata = $adddata;
        $this->useraccess = $useraccess;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adddata = $this->adddata;
        $useraccess = $this->useraccess;

        Mail::to($adddata->email)->send(new WelcomeEmail($adddata , $useraccess));
    }
}
