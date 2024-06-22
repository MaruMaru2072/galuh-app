@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Create New Item</h1>

    <form method="POST" action="{{ route('store.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>
        <div class="mb-3">
            <label for="item_price" class="form-label">Item Price</label>
            <input type="number" class="form-control" id="item_price" name="item_price" required></textarea>
        </div>
        <div class="mb-3">
            <label for="item_stock" class="form-label">Item Stock</label>
            <input type="number" class="form-control" id="item_stock" name="item_stock" required></textarea>
        </div>
        <div class="mb-3">
            <label for="item_image_url" class="form-label">Item Image URL</label>
            <input type="text" class="form-control" id="item_image_url" name="item_image_url" required></textarea>
        </div>
        <!-- <div class="mb-3">
            <label for="file">Select a file to upload:</label>
            <input type="file" id="file" name="file">
        </div> -->
        <button type="submit" class="btn btn-danger">Create Item</button>
    </form>
</div>
@endsection
