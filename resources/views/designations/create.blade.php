@extends('layouts.app')

@section('title', 'Add Department')

@section('content')
    <h2>Add New Designation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('designations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Designation Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
