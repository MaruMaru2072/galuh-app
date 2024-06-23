@extends('layouts.app')
@section('content')
<div class="body mt-2 ms-5 d-flex justify-content-center align-items-center" style="height: 91vh">
    <div class="detailparent p-3">
        <div class=" d-flex align-items-center">
            <img src="{{asset($items->photourl)}}" class="" alt="...">
        </div>
        <div class=" mt-3 detaildesc">
            <h4>{{ $items->name }}</h4>
            <div class="detailchild ps-4">
                <p class="detailtitle" style="padding-right: 7.5vw">Detail</p>
                <p class="me-3 desc">{{ $items->detail }}</p>
            </div>
            <div class="detailchild ps-4">
                <p class="detailtitle" style="padding-right: 7.5vw;">Price</p>
                <p class="me-3">IDR {{ $items->price }}</p>
            </div>
            <form action="/cartPage" method="post">
                @csrf
                <div class="detailchild ps-4 align-items-center">
                    <p class="detailtitle m-0" style="padding-right: 7.5vw;"> Qty</p>
                    <input name="quantity" type="number" class="form-control" id="inputqty">
                    <input name="itemid" value="{{ $items->id }}" type="hidden">
                </div>
                <button type="submit" class="btn btn-outline-dark detailchild ms-4 mt-3">Purchase</button>
            </form>
        </div>
    </div>
</div>
@endsection
