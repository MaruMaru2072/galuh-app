@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Forum Pecinta Hewan</h1>

    <form method="GET" action="{{ route('forum.index') }}">
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Search by title" value="{{ request('title') }}">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-control">
                    <option value="">Select Category</option>
                    <option value="Pet Carer">Pet Carer</option>
                    <option value="Pet Product">Pet Product</option>
                    <option value="Fact About Pet">Fact About Pet</option>
                    <option value="General Discussion">General Discussion</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Search</button>
    </form>

    @foreach ($forums as $forum)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('forum.show', $forum->id) }}">{{ $forum->title }}</a></h5>
                <p class="card-text">{{ $forum->content }}</p>
                <p class="card-text"><small class="text-muted">By {{ $forum->user->name }} on {{ $forum->created_at->format('d M Y') }}</small></p>
                <p class="card-text"><small class="text-muted">Category: {{ $forum->category }}</small></p>
            </div>
        </div>
    @endforeach
</div>
@endsection
