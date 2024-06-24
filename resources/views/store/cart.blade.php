@extends('layouts.app')
<head>
    <script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
</head>
@section('content')
    @foreach ($cartdetail as $product)
        <div class="body mt-5 ms-5">
            <div class="">
                <div class="d-flex mt-1">
                    <div class="managelist">
                        <div class="d-flex" style="background-color: white;">
                            <div>
                                <img src="{{ asset($product->connectItem->photourl) }}" class="manageimg" alt="...">
                            </div>
                            <div class="managetitle ms-4 mt-4 w-100">
                                <h4 class="card-text">{{ $product->connectItem->name }}</h4>
                                <p class="card-text">Quantity: {{ $product->qty }}</p>
                                <p class="card-text">Price: {{ $product->qty * $product->connectItem->price }}</p>
                            </div>
                            <form class="me-3 mt-4 w-100 d-flex justify-content-end" action="/cartPage/{{ $product->id }}"
                                method="post">
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
    <footer class="d-flex mt-3">
        <div class="gap-3 align-items-center d-flex w-100 justify-content-center" style="background-color: white">
            @if (count($cartdetail))

                <p class="mt-3">Total price: IDR {{ $totalPrice }}</p>

                <form action="/processPayment" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-outline-success">Checkout</button>
                </form>

            @else
                <p class="mt-3">No items in cart yet!</p>
            @endif
        </div>
    </footer>

@endsection
