@extends('layouts.app')

@section('content1')

<h1 style="text-align: center">List of All Standard</h1><br>
@if(session('access_type') == "admin" || session('access_type') == "teacher")
    <form style="text-align: center" action="{{ route('standard.store') }}" method="POST">
        @csrf
        <label for="standard">Add New Subject : </label>
        <input type="text" name="standard">
        <input type="submit" name="add_std" value="Add Standard">
    </form><br>
@endif
<div style="text-align: center;">
    <table border="2" style="display:inline-block; text-align: center;">
        <thead>
            <tr>
                <th style="padding: 5px">ID</th>
                <th>Standard</th>
                @if(session('access_type') == "admin" || session('access_type') == "teacher")
                    <th>Edit</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        @forelse ($standard as $std)
        <tr>
            <td style="padding: 5px">
                {{ $std->id }}
            </td>
            <td>
                {{ $std->standard }}
            </td>
            @if(session('access_type') == "admin" || session('access_type') == "teacher")
                <td>
                    <button> <a href="{{ route('standard.edit', $std->id) }}"> Edit </a> </button>
                </td>
                <td>
                    <form action="{{ route('standard.delete', $std->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            @endif
        </tr>
        <tr>
            @empty
            <div>There are no standards!</div>
        </tr>
        @endforelse
    </table>
</div>

@endsection
