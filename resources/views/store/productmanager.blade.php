@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <form action="/manageProductPage" method="post">
            @csrf
            <div class="input-group d-flex justify-between">
                <input type="textarea" class="form-control" aria-label="Recipient's username"
                       aria-describedby="button-addon2" name="searchadmin">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">&#x1F50D</button>
            </div>
        </form>
        <div>
            <a href="/manageCategory">
                <button type="button d-flex" class="btn btn-secondary">Add Category +</button>
            </a>
            <a href="/addProductPage">
                <button type="button d-flex" class="btn btn-secondary">Add Product +</button>
            </a>
        </div>
    </div>
    <div class="ms-5">
        @if (session('success'))
            <b>{{ Session::get('success') }}</b>
        @endif
    </div>
    @foreach ($items as $item)
        <div class="body mt-2">
            <div class="">
                <div class="d-flex justify-content-center">
                    <div class="managelist">
                        <div class="d-flex" style="background-color: white; width: 70vw;">
                            <div>
                            </div>
                            <img src="{{asset($item->photourl)}}" style="max-height:30vh; max-width:20vw;"
                                 class="manageimg" alt="...">
                            <div class="managetitle ms-4 mt-4">
                                <h3 class="card-text"><b>{{ $item->name }}</b></h3>
                                <h6>Category: {{ $item->connectCategory->name }}</h6>
                                <p class="card-text">Detail : {{ $item->detail }}</p>
                            </div>
                            <div class="d-flex mt-4 me-3 justify-content-end" style="width: 100%">
                                <a href="/toggleProduct/{{ $item->id }}">
                                    @if($item->is_visible == true)
                                        <button type="button" class="managebtn btn btn-outline-success">🔓</button>
                                    @else
                                        <button type="button" class="managebtn btn btn-outline-secondary">🔒</button>
                                    @endif

                                </a>
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
