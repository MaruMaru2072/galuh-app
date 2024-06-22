@extends('layouts.app')
@section('content')
<div class="body mt-2 ms-5" style="width: 93%">
    <div class="percategory mt-3 pb-4">
        <div class="category d-flex pb-2 pt-2">
            <p class="mb-0 ps-3 pe-2">Category {{ $category->name }}</p>
        </div>
        <div class="prodparentcategory d-flex">
            @foreach ($categoriedItems as $item)
                @if ($item->category_id == $category->id)
                    <a href="/productDetailPage/{{ $item->id }}" class="prodlist">
                    <div class="card">
                        <img src="{{asset($item->photourl)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">{{$item->name}}</p>
                          <h6 class="card-price">IDR {{ $item->price }}</h6>
                        </div>
                      </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-end" style="width: 100%">
        {{ $categoriedItems ->links() }}
    </div>
</div>
@endsection
