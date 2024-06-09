@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Forum Pecinta Hewan</h1>
    <div class="mb-4">
        <form method="GET" action="{{ route('forum.index') }}">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search forums..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        <option value="Pet Carer">Pet Carer</option>
                        <option value="Pet Product">Pet Product</option>
                        <option value="Fact About Pet">Fact About Pet</option>
                        <option value="General Discussion">General Discussion</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-6">
                            <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ request('end_date') }}">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    <div class="mb-4">
        @auth
            <a href="{{ route('forum.create') }}" class="btn btn-success">Create New Forum</a>
        @endauth
    </div>
    <div class="row">
        @forelse ($forums as $forum)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $forum->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $forum->category }}</h6>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($forum->content, 100) }}</p>
                        @if ($forum->user)
                            <p class="card-text"><small class="text-muted">Created by {{ $forum->user->name }} on {{ $forum->created_at->format('M d, Y') }}</small></p>
                        @else
                            <p class="card-text"><small class="text-muted">Unknown user on {{ $forum->created_at->format('M d, Y') }}</small></p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>No forums found.</p>
        @endforelse
    </div>
</div>
@endsection
