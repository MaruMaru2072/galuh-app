@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Create Forum</h1>

    <form method="POST" action="{{ route('forum.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Pet Carer">Pet Carer</option>
                <option value="Pet Product">Pet Product</option>
                <option value="Fact About Pet">Fact About Pet</option>
                <option value="General Discussion">General Discussion</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Forum</button>
    </form>
</div>
@endsection
