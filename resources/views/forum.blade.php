@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Forum Pecinta Hewan</h1>

    <form method="GET" action="{{ route('forum.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search forums">
            </div>
            <div class="col-md-3">
                <input type="date" name="start_date" class="form-control" placeholder="From Date">
            </div>
            <div class="col-md-3">
                <input type="date" name="end_date" class="form-control" placeholder="To Date">
            </div>
            <div class="col-md-2">
                <select name="category" class="form-control">
                    <option value="">All Categories</option>
                    <option value="Pet carer">Pet carer</option>
                    <option value="Pet product">Pet product</option>
                    <option value="Fact about pet">Fact about pet</option>
                    <option value="General discussion">General discussion</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </form>

    @auth
    <a href="{{ route('forum.create') }}" class="btn btn-success mb-4">Create New Forum</a>
    @endauth

    <div class="list-group">
        @foreach ($forums as $forum)
        <div class="list-group-item">
            <h5>{{ $forum->title }}</h5>
            <p>By {{ $forum->user->name }} | {{ $forum->created_at->format('d M Y') }} | Category: {{ $forum->category }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
