@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>{{ $forum->title }}</h1>
    <p>{{ $forum->content }}</p>
    <p><small class="text-muted">Category: {{ $forum->catforum->name }}</small></p>

    <hr>

    <h5>Comments</h5>

    @foreach($forum->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <p><small class="text-muted">By {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small></p>
            </div>
        </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store', $forum) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Add a comment</label>
                <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to post a comment.</p>
    @endauth
</div>
@endsection
