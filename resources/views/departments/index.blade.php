@extends('layouts.app')

@section('title', 'Departments')

@section('content')
    <h2>Departments List</h2>
    
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

    <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display pagination links -->
    <div class="d-flex justify-content-center">
        {{ $departments->links() }}
    </div>
@endsection


@section('scripts')
    <script>
        function changeSvgSize(className, width, height) {
            var svgs = document.querySelectorAll(className);
            svgs.forEach(function(svg) {
                svg.setAttribute('width', width);
                svg.setAttribute('height', height);
            });
        }

        // Change the SVG size to 50x50 for all elements with the class 'resize-svg'
        changeSvgSize('.w-5', '15', '15');
    </script>
@endsection