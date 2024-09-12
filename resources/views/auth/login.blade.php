@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login</h2>
    <form method="POST" action="{{ url('login') }}">
        @csrf
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
        <button type="submit">Login</button>
    </form>
@endsection
