<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function index()
    {
        $standards = Standard::all();
        $subjects = Subject::all();

        return view('assign_subjects.index', compact('standards', 'subjects'));
    }

    public function assign(Request $request)
    {
        $standardID = $request->input('standard');
        $subjectId = $request->input('subjects',[]);

        $standard = Standard::find($standardID);
        $standard->subjects()->syncWithoutDetaching($subjectId);
        return redirect()->route('assign_subject.show')->with('success', 'Subject assigned successfully.');
    }
}
