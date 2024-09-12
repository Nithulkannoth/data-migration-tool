@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
    <h2>Edit Designation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('designations.update', $designation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Designation Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $designation->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
