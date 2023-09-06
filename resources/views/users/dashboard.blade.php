@extends('layouts.app')

@section('title','User Dashboard')

@section('content1')

<h1>{{ session('first_name') }}  Welcome To Dashboard, Your Role is {{ session('access_type')}} </h1>

@endsection
