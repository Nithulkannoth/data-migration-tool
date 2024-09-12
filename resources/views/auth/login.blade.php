@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-end">
        <a href="{{ route('user.register') }}" class="btn btn-success">Register</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <h2>Login</h2>
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <table class="table table-borderless">
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password:</label>
                </td>
                <td>
                    <input type="password" class="form-control" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Login</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
