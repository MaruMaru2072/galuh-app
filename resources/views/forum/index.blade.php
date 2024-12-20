@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Forum Pecinta Hewan</h1>

    <div class="d-flex justify-content-between mb-4">
        <form method="GET" action="{{ route('forum.index') }}" class="d-flex flex-grow-1 me-2">
            <input type="text" name="title" class="form-control me-2" placeholder="Search by title" value="{{ request('title') }}">
            <select name="category" class="form-control me-2">
                <option value="">Select Category</option>
                @foreach($catforums as $catforum)
                    <option value="{{ $catforum->id }}" {{ request('category') == $catforum->id ? 'selected' : '' }}>{{ $catforum->name }}</option>
                @endforeach
            </select>
            <input type="date" name="from_date" class="form-control me-2" value="{{ request('from_date') }}">
            <input type="date" name="to_date" class="form-control me-2" value="{{ request('to_date') }}">
            <button type="submit" class="btn btn-primary me-2">Search</button>
        </form>

        @auth
            <div>
                <a href="{{ route('forum.create') }}" class="btn btn-success">Create Forum</a>
                @if(auth()->user()->is_admin)
                    <a href="{{ route('catforum.create') }}" class="btn btn-secondary">Add Category</a>
                @endif
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-success">Create Forum</a>
        @endauth
    </div>

    @foreach ($forums as $forum)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('forum.show', $forum->id) }}">{{ $forum->title }}</a></h5>
                <p class="card-text">{{ $forum->content }}</p>
                <p class="card-text"><small class="text-muted">By {{ $forum->user->name }} on {{ $forum->created_at->format('d M Y') }}</small></p>
                <p class="card-text"><small class="text-muted">Category: {{ $forum->catforum->name }}</small></p>
            </div>
        </div>
    @endforeach
</div>
@endsection
