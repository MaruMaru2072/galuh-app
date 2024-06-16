@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $forum->title }}</h5>
            <p class="card-text">{{ $forum->content }}</p>
            <p class="card-text"><small class="text-muted">By {{ $forum->user->name }} on {{ $forum->created_at->format('d M Y') }}</small></p>
        </div>
    </div>

    <h3>Comments</h3>

    @foreach ($forum->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $comment->content }}</p>
                <p class="card-text"><small class="text-muted">By {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small></p>
            </div>
        </div>
    @endforeach

    @auth
        <form method="POST" action="{{ route('comments.store', $forum->id) }}">
            @csrf
            <div class="form-group mb-3">
                <label for="content">Add a comment</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endauth

    @guest
        <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
    @endguest
</div>
@endsection
