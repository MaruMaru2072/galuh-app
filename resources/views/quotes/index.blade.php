@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quotes About Cats</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        @if (Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('quotes.create') }}" class="btn btn-primary">Add Quote</a>
        @endif
    </div>

    <div class="row">
        @foreach ($quotes as $quote)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $quote->quote }}</p>
                            <footer class="blockquote-footer">{{ $quote->author }}</footer>
                        </blockquote>
                        @if (Auth::check() && Auth::user()->is_admin)
                            <form action="{{ route('quotes.destroy', $quote) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
