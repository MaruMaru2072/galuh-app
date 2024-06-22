@extends('layouts.app')
@section('content')
    <div class="input-group mt-5 ms-5" style="width: 90%">
        <form action="/searchResultPage" method="post" class="w-100 d-flex">
            @csrf
            <input type="textarea" class="form-control" aria-describedby="button-addon2" name="search">
            <button class="btn btn-outline-secondary" type="submit">&#x1F50D</button>
        </form>
    </div>
    <div class="body mt-2 ms-5">
        @foreach ($categories as $category)
            <div class="percategory mt-3 pb-4">
                <div class="category d-flex pb-2 pt-2">
                    <p class="mb-0 ps-3 pe-2">{{ $category->name }}</p>
                    <a href="/categoryPage/{{ $category->id }}" style="text-decoration:none;">View All</a>
                </div>
                <div class="prodparent d-flex">
                    @foreach ($items as $item)
                        @if ($item->category_id == $category->id)
                            <a href="/productDetailPage/{{ $item->id }}" class="prodlist">
                                <div class="card">
                                    <img src="{{ asset($item->photourl) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->name }}</p>
                                        <h6 class="card-price">{{ $item->price }}</h6>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
