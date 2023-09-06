<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Userdata;
use Illuminate\Http\Request;

class AssignStudentController extends Controller
{
    public function index(){
        $standards = Standard::all();

        $check = "student";
        $result = Userdata::select('useraccesstypes.userid', 'userdatas.first_name')
        ->join('useraccesstypes', 'userdatas.id', '=', 'useraccesstypes.userid')
        ->join('useraccess', 'useraccesstypes.useraccessid', '=', 'useraccess.id')
        ->where('useraccess.access_type', $check)
        ->get();

        $students = $result;

        return view('assign_students.index', compact('standards', 'students'));
    }

    public function assign(Request $request)
    {
        $standardID = $request->input('standard');
        $studentId = $request->input('student',[]);

        $standard = Standard::find($standardID);
        $standard->students()->syncWithoutDetaching($studentId);
        return redirect()->route('assign_student.show')->with('success', 'Subject assigned successfully.');
    }
}
