@extends('layouts.app')
@section('content')
    <div class="input-group mt-5 ms-5" style="width: 90%">
        <form action="/searchResultPage" method="post" class="w-100 d-flex">
            @csrf
            <input type="textarea" class="form-control" aria-describedby="button-addon2" name="search"
                value={{ $searched->search }}>
            <button class="btn btn-outline-secondary" type="submit">&#x1F50D</button>
        </form>
    </div>
    <div class="body mt-2 ms-5">
        <div class="percategory mt-3 pb-4">
            <div class="pt-2">
                <div class="prodparent d-flex">
                    @foreach ($q as $item)
                        <a href="/productDetailPage/{{ $item->id }}" class="prodlist">
                            <div class="card">
                                <img src="storage/images/{{ asset($item->photourl) }}" style="max-height:35vh; max-width:15vw;" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">{{ $item->name }}</p>
                                    <h6 class="card-price">{{ $item->price }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
