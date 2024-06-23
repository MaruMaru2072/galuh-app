@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between ms-3 mb-5" style="width: 91%">
    <form action="/manageProductPage" method="post">
        @csrf
        <div class="input-group mt-5 ms-5 d-flex" style="width: 100%">
            <input type="textarea" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" name="searchadmin">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">&#x1F50D</button>
        </div>
    </form>
    <a href="/addProductPage"><button type="button d-flex" class="btn btn-secondary mt-5 ms-5">Add Product <b>+</b></button></a>
</div>
<div class="ms-5">
    @if (session('success'))
        <b>{{ Session::get('success') }}</b>
    @endif
</div>
@foreach ($items as $item)
<div class="body mt-2 ms-5">
    <div class="">
        <div class="d-flex mt-1">
            <div class="managelist">
                <div class="d-flex" style="background-color: white;">
                    <div>
                        </div>
                    <img src="{{asset($item->photourl)}}" style="max-height:35vh; max-width:15vw;" class="manageimg" alt="...">
                    <div class="managetitle ms-4 mt-4">
                        <h4 class="card-text">{{ $item->name }}</h4>
                    </div>
                    <div class="d-flex mt-4 me-3 justify-content-end" style="width: 100%">
                        <a href="/updateProduct/{{ $item->id }}">
                            <button type="button" class="managebtn btn btn-outline-warning">&#9999</button>
                        </a>
                        <form action="/deleteitem/{{ $item->id }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="managebtn btn btn-outline-danger">&#128465</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="mt-3 d-flex justify-content-center">
    {{ $items->links() }}
</div>
@endsection
