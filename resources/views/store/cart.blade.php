@extends('layouts.app')
<head>
    <script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
</head>

@section('content')
    @foreach ($cartdetail as $product)

        <div class="d-flex">
            <div class="d-flex" style="background-color: white; width: 70vw;">
                <img src="{{ asset($product->connectItem->photourl) }}" style="max-height:35vh; max-width:15vw;"
                     class="manageimg" alt="...">
                <div class="managetitle ms-4 mt-4">
                    <a href="/productDetailPage/{{ $product->connectItem->id }}">
                        <h5 class="card-title">
                            <u>
                                {{ $product->connectItem->name }}
                            </u>
                        </h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-body-secondary">
                        Price: Rp. {{ $product->qty * $product->connectItem->price }}</h6>
                    <p class="card-text">{{ $product->qty }} item(s)</p>
                </div>
                <div class="d-flex mt-4 me-3 justify-content-end" style="width: 100%">
                    <form action="/cartPage/{{ $product->id }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="managebtn btn btn-outline-danger">&#128465</button>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

    <footer class="d-flex mt-3">
        <div class="d-flex align-items-center justify-content-center" style="background-color: white; width: 100vw;">
            @if (count($cartdetail))

                <p class="mt-3">Total price: Rp. {{ $totalPrice }}</p>

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
