@extends('layouts.app')

@section('content1')

<h1 style="text-align: center">List of All Subjects</h1><br>
@if(session('access_type') == "admin" || session('access_type') == "teacher")
    <form style="text-align: center" action="{{ route('subject.store') }}" method="POST">
        @csrf
        <label for="subject">Add New Subject : </label>
        <input type="text" name="subject">
        <input type="submit" name="add_sub" value="Add Subject">
    </form><br>
@endif
<div style="text-align: center;">
    <table border="2" style="display:inline-block; text-align: center;">
        <thead>
            <tr>
                <th style="padding: 5px">ID</th>
                <th>Subject</th>
                @if(session('access_type') == "admin" || session('access_type') == "teacher")
                    <th>Edit</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        @forelse ($subject as $sub)
        <tr>
            <td style="padding: 5px">
                {{ $sub->id }}
            </td>
            <td>
                {{ $sub->subject }}
            </td>
            @if(session('access_type') == "admin" || session('access_type') == "teacher")
                <td>
                    <button> <a href="{{ route('subject.edit', $sub->id) }}"> Edit </a> </button>
                </td>
                <td>
                    <form action="{{ route('subject.delete', $sub->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            @endif
        </tr>
        <tr>
            @empty
            <div>There are no chapters!</div>
        </tr>
        @endforelse
    </table>
</div>

@endsection
