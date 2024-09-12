@extends('layouts.app')

@section('title', 'Registration Success')

@section('content')
    <div class="alert alert-success">
        <p>User registered successfully!</p>
        <p><a href="{{ route('login') }}">Click here to login</a></p>
    </div>
@endsection
