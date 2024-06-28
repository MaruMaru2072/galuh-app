@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Create New Forum</h1>

    <form method="POST" action="{{ route('forum.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="catforum_id" class="form-label">Category</label>
            <select class="form-select @error('catforum_id') is-invalid @enderror" id="catforum_id" name="catforum_id" required>
                <option value="">Select Category</option>
                @foreach($catforums as $catforum)
                    <option value="{{ $catforum->id }}" {{ old('catforum_id') == $catforum->id ? 'selected' : '' }}>{{ $catforum->name }}</option>
                @endforeach
            </select>
            @error('catforum_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
