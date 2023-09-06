@extends('layouts.app')

@section('content1')
<h1 style="text-align: center">List Of All Users</h1><br>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>State</th>
            <th>User Name</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    @forelse ($userdatas as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->first_name }}
        </td>
        <td>
            {{ $data->last_name }}
        </td>
        <td>
            {{ $data->email }}
        </td>
        <td>
            {{ $data->state }}
        </td>
        <td>
            {{ $data->user_name }}
        </td>
        <td>
            <button> <a href="{{ route('user.display', $data->id) }}">Show</a> </button>
        </td>
        <td>
            <button> <a href="{{ route('user.edit', $data->id) }}"> Edit </a> </button>
        </td>
        <td>
            <form action="{{ route('user.delete', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <tr>
        @empty
        <div>There are no data!</div>
    </tr>
    @endforelse
</table>

@endsection
