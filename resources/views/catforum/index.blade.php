@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Forum Categories</h1>

    <div class="mb-3">
        <a href="{{ route('catforum.create') }}" class="btn btn-primary">Create Category</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catforums as $catforum)
                <tr>
                    <td>{{ $catforum->id }}</td>
                    <td>{{ $catforum->name }}</td>
                    <td>
                        <a href="{{ route('catforum.edit', $catforum->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('catforum.destroy', $catforum->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
