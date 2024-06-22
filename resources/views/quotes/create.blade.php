@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Quote</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('quotes.store') }}">
        @csrf

        <div class="mb-3">
            <label for="quote" class="form-label">Quote</label>
            <input type="text" class="form-control" id="quote" name="quote" value="{{ old('quote') }}" required>
            @error('quote')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Quote</button>
    </form>
</div>
@endsection
