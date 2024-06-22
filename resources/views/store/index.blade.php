@extends('layout')
@section('content')
<div class="container my-5">

    <h1 class="text-center mb-4">Katalog Produk</h1>

    <form method="GET" action="{{ route('store.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search forums">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </form>

    <a href="{{ route('store.create') }}" class="btn btn-success mb-4">Create New Item</a>

    <div class="row">
        @forelse ($items as $item)
            <div class="col-mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->item_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->item_price }}</h6>
                        <p class="card-text">{{ $item->item_image_url }}</p>
                        <a href="/itemDetailView/{{ $item->id }}">Check detail of {{ $item->item_name }}</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No items found.</p>
        @endforelse
    </div>

</div>
@endsection