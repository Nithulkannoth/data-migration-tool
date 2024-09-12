@extends('layouts.app')

@section('title', 'Registration Success')

@section('content')
    <div class="alert alert-success">
        <p>User login failed !</p>
        <p>Invalid username or password</p>
        <p><a href="{{ route('login') }}">Click here to login</a></p>
    </div>
@endsection
