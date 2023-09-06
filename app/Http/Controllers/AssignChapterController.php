<?php

namespace App\Http\Controllers;

use App\Events\ChaperAssigned;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignChapterController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $chapters = Chapter::all();

        return view('assign_chapters.index', compact('subjects', 'chapters'));
    }

    public function assign(Request $request)
    {
        $subjectId = $request->input('subject');
        $chapterId = $request->input('chapters');

        $subjectdata = Subject::find($subjectId);
        $user = Userdata::find(Auth::user()->id);


        $subject = Subject::find($subjectId);
        $chapter = Chapter::find($chapterId);
        $subject->chapters()->syncWithoutDetaching($chapterId);

        event(new ChaperAssigned($subjectdata , $chapter , $user));

        return redirect()->route('assign_chapter.show')->with('success', 'Chapter assigned successfully.');
    }
}
