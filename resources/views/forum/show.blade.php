@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>{{ $forum->title }}</h1>
    <p>{{ $forum->content }}</p>
    <p><small>By {{ $forum->user->name }} on {{ $forum->created_at->format('d M Y') }}</small></p>
    <p><small>Category: {{ $forum->category->name }}</small></p>

    <h3>Comments</h3>
    @foreach($forum->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <p><small>By {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small></p>
            </div>
        </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Add a Comment</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to post a comment.</p>
    @endauth
</div>
@endsection
