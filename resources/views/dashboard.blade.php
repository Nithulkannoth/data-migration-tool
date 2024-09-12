@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Welcome to the Dashboard!</h2>
    <p>You are successfully logged in and can access this page.</p>

    <!-- Add links to the dashboard -->
    <div class="mt-4">
        <p><a href="{{ route('employees.upload.form') }}" class="btn btn-primary">Upload Employees</a></p>
        <p><a href="{{ route('departments.index') }}" class="btn btn-primary">Departments</a></p>
        <p><a href="{{ route('designations.index') }}" class="btn btn-primary">Designations</a></p>
    </div>
@endsection
