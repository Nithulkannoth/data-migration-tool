@extends('layouts.app')

@section('title', 'Designation')

@section('content')
    <h2>Designation List</h2>
    
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

    <a href="{{ route('designations.create') }}" class="btn btn-primary">Add Designation</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $designation)
                <tr>
                    <td>{{ $designation->id }}</td>
                    <td>{{ $designation->name }}</td>
                    <td>
                        <a href="{{ route('designations.edit', $designation->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('designations.destroy', $designation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  
    <div>
        {{ $designations->links() }}
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