@extends('layouts.app')
@section('content')

    <div class="input-group d-flex justify-content-center" style="width: 90%">
        <form action="/searchResultPage" method="post" class="w-100 d-flex">
            @csrf
            <input type="textarea" class="form-control" aria-describedby="button-addon2" name="search"
                   value={{ $searched->search }}>
            <button class="btn btn-outline-secondary" type="submit">&#x1F50D</button>
        </form>
    </div>

    <div class="d-flex justify-content-center pt-3">
        @if($q->isEmpty())
            <p class="text-secondary">No such items contains "{{ $searched->search }}"</p>
        @else
            <p class="text-secondary">Showing search results for items containing "{{ $searched->search }}"</p>
        @endif
    </div>

    <div class="percategory mt-3 pb-4">

        <div class="scrollmenu" style="overflow-x: scroll; overflow-y: hidden; white-space: nowrap;">

            @foreach ($q as $item)
                @if($item->is_visible)
                    <a href="/productDetailPage/{{ $item->id }}">
                        <div class="card pt-1" style="width: 20vw; height: 35vh; display: inline-block;">
                            <img class="card-img-top img-thumbnail object-fit-cover border rounded"
                                 src="{{ asset($item->photourl) }}" style="width: 20vw; height: 25vh" alt="Item Image">
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

                        </div>
                    </a>
                @endif
            @endforeach

        </div>

    </div>

@endsection
