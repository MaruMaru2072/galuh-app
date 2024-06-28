@extends('layouts.app')
@section('content')
    <div class="body mt-2 ms-5 d-flex justify-content-center align-items-center" style="height: 91vh">
        <div class="detailparent p-3">

            <div class="card d-flex align-items-left" style="width: 30vw;">
                <img src="{{asset($items->photourl)}}"
                     class="card-img-top img-thumbnail object-fit-cover border rounded" alt="Item Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $items->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Rp. {{ $items->price }}</h6>
                    <p class="card-text">{{ $items->detail }}</p>
                    <form action="/cartPage" method="post">
                        @csrf
                        <p class="detailtitle"> Qty</p>
                        <input name="quantity" type="number" class="form-control" id="inputqty">
                        <input name="itemid" value="{{ $items->id }}" type="hidden">
                        <button type="submit" class="btn btn-outline-dark detailchild mt-3">Purchase</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
