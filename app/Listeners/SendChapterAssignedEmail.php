<?php

namespace App\Listeners;

use App\Events\ChaperAssigned;
use App\Jobs\ChapterAssignJob;
use App\Mail\ChapterAssignedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendChapterAssignedEmail
{
    public function handle(ChaperAssigned $event)
    {
        $subjectdata = $event->subjectdata;
        $chapter = $event->chapter;
        $user = $event->user;


        ChapterAssignJob::dispatch($subjectdata , $chapter , $user);
        // Mail::to($user->email)->send(new ChapterAssignedMail($subjectdata , $chapter , $user));

    }
}
