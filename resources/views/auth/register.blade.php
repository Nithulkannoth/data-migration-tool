@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h2>Register</h2>
    <form method="POST" action="{{ url('register') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
@endsection
