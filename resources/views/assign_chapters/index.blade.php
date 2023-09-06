@extends('layouts.app')

@section('title', 'Assign Chapters to Subjects')

@section('content1')
    <h1 style="text-align: center">Assign Chapter to Subject</h1><br>
    <form style="text-align: center" method="POST" action="{{ route('assign_chapter.store') }}">
        @csrf
        <label>Subject:</label>
        <select name="subject" required>
            @foreach ($subjects as $sub)
                <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
            @endforeach
        </select><br><br>

        <label>Chapters:</label>
        <select name="chapters" required>
            @foreach ($chapters as $chap)
                @if ($chap->status)
                    <option value="{{ $chap->id }}">{{ $chap->chapter }}</option>
                @endif
            @endforeach
        </select><br><br>

        <button type="submit">Assign Chapter</button>
    </form>
@endsection
