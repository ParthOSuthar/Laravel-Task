<?php

namespace App\Jobs;

use App\Mail\ChapterAssignedMail;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Userdata;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ChapterAssignJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $subjectdata;
    public $chapter;
    protected $user;
    public function __construct( $subjectdata, $chapter, Userdata $user)
    {

        $this->subjectdata = $subjectdata;
        $this->chapter = $chapter;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $user = $this->user;
        $subjectdata = $this->subjectdata;
        $chapter = $this->chapter;
        
        Mail::to($user['email'])->send(new ChapterAssignedMail($subjectdata , $chapter , $user));
    }
}
