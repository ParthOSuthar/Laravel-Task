@extends('layouts.app')

@section('title', 'Assign Subjects to Standard')

@section('content1')
    <h1 style="text-align: center">Assign Subject to Standard</h1><br>
    <form style="text-align: center" method="POST" action="{{ route('assign_subject.store') }}">
        @csrf
        <label>Standard:</label>
        <select name="standard" required>
            @foreach ($standards as $std)
                <option value="{{ $std->id }}">{{ $std->standard }}</option>
            @endforeach
        </select><br><br>

        <label>Subject:</label>
        <select name="subjects" required>
            @foreach ($subjects as $sub)
                <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign Subject</button>
    </form>
@endsection
