@extends('layout')
@section('content')
<div class="container my-5">

<div class="text-center">
    Product name : {{ $item->item_name }} <br>
    Stocks left : {{ $item->item_stock }} <br>
    Product price : {{ $item->item_price }} <br>
    <form action="/cart" method="POST">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="item_price" value="{{ $item->item_price }}">
        <br>
        <button type="submit" class="btn btn-danger mt-3">Add to cart</button>
    </form>
</div>

</div>
@endsection