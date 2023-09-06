<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'chapter' => 'required|string|max:255',
        ]);

        $chapter = new Chapter();
        $chapter->chapter = $request->input('chapter');
        $chapter->save();

        return redirect()->route('chapter.show')->with('success', 'Chapter added successfully!');
    }
    public function show()
    {
        $chapter = Chapter::all();
        return view('chapters.index', compact('chapter'));
    }

    public function display($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.display', compact('chapter'));
    }

    public function updatestatus($id){
        $status = Chapter::findOrFail($id);
        $status->status = !$status->status;
        $status->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.edit', compact('chapter'));
    }


    public function update(Request $request, $id)
    {
        // $request->validated();

        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->all());
        $chapter->save();
        return redirect()->route('chapter.show')->with('success', 'Chapter updated successfully');
    }

    public function delete($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();
        return redirect()->route('chapter.show')->with('success', 'Chapter deleted successfully');
    }
}
