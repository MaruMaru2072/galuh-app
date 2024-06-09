@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Create New Forum</h1>

    <form method="POST" action="{{ route('forum.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-control" required>
                <option value="Pet carer">Pet carer</option>
                <option value="Pet product">Pet product</option>
                <option value="Fact about pet">Fact about pet</option>
                <option value="General discussion">General discussion</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Forum</button>
    </form>
</div>
@endsection
