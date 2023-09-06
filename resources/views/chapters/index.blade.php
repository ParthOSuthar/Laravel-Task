@extends('layouts.app')

@section('content1')
<h1 style="text-align: center">List of All Chapters</h1><br>
@if(session('access_type') == "admin" || session('access_type') == "teacher")
<form style="text-align: center" action="{{ route('chapter.store') }}" method="POST">
    @csrf
    <label for="chapter">Add New Chapter : </label>
    <input type="text" name="chapter">
    <input type="submit" name="add_chap" value="Add Chapter">
</form><br>
@endif
<div style="text-align: center;">
    <table border="2" style="display:inline-block; text-align: center;">
        <thead>
            <tr>
                <th style="padding: 5px">ID</th>
                <th>Chapter</th>
                @if(session('access_type') == "admin" || session('access_type') == "teacher")
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        @forelse ($chapter as $chap)
        <tr>
            <td style="padding: 5px">
                {{ $chap->id }}
            </td>
            <td>
                {{ $chap->chapter }}
            </td>
            @if(session('access_type') == "admin" || session('access_type') == "teacher")
                @if ($chap->status)
                    <td> Active </td>
                @else
                    <td> Deactive </td>
                @endif
                <td>
                    <form method="POST" action="{{ route('chapter.updatestatus', $chap->id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn">
                            {{ $chap->status ? 'Deactivate ' : 'Activate' }} Chapter
                        </button>
                      </form>
                </td>
                <td>
                    <button> <a href="{{ route('chapter.edit', $chap->id) }}"> Edit </a> </button>
                </td>
                <td>
                    <form action="{{ route('chapter.delete', $chap->id) }}" method="POST">
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
