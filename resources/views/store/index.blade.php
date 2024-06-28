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

                <div class="scrollmenu" style="overflow-x: scroll; overflow-y: hidden; white-space: nowrap;">

                    @foreach ($items as $item)
                        @if ($item->category_id == $category->id && $item->is_visible == true)
                            <div class="card pt-1" style="width: 20vw; height: 35vh; display: inline-block;">
                                <a href="/productDetailPage/{{ $item->id }}">
                                    <img class="card-img-top img-thumbnail object-fit-cover border rounded"
                                         src="{{ asset($item->photourl) }}" style="width: 20vw; height: 25vh"
                                         alt="Item Image">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="
                                                    width: 15vw;
                                                    overflow: hidden;
                                                    white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                ">{{ $item->name }}</h5>
                                        <p class="card-text">Rp.{{ $item->price }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        @endforeach
    </div>
@endsection
