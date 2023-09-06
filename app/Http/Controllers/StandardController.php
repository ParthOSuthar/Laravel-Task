<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|string|max:255',
        ]);

        $standard = new Standard();
        $standard->standard = $request->input('standard');
        $standard->save();

        return redirect()->route('standard.show')->with('success', 'standard added successfully!');
    }
    public function show()
    {
        $standard = Standard::all();
        return view('standards.index', compact('standard'));
    }

    // public function display($id)
    // {
    //     $standard = Standard::find($id);
    //     return view('standards.display', compact('standard'));
    // }

    public function edit($id)
    {
        $standard = Standard::find($id);
        return view('standards.edit', compact('standard'));
    }


    public function update(Request $request, $id)
    {
        // $request->validated();

        $standard = Standard::findOrFail($id);
        $standard->update($request->all());
        $standard->save();
        return redirect()->route('standard.show')->with('success', 'standard updated successfully');
    }

    public function delete($id)
    {
        $standard = Standard::findOrFail($id);
        $standard->delete();
        return redirect()->route('standard.show')->with('success', 'standard deleted successfully');
    }
}
