@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST" action="{{ url('register') }}">
        @csrf
        <table class="table table-borderless">
            <tr>
                <td>
                    <label for="name">Name:</label>
                </td>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
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
                <td>
                    <label for="password_confirmation">Confirm Password:</label>
                </td>
                <td>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Register</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
