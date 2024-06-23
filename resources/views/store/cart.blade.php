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

                <!-- <form action="/afterPurchase" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-success">Checkout</button>
                </form> -->
                
                <button id="google-pay-button">Pay with Google Pay</button>
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded", async function () {
                        const payments = Square.payments('{{ config('services.square.application_id') }}', '{{ config('services.square.location_id') }}');
                        const wallet = await payments.wallet();

                        if (wallet.isSupported('googlePay')) {
                            const googlePayButton = wallet.createButton({
                                wallet: 'googlePay',
                                paymentRequest: {
                                    countryCode: 'US',
                                    currencyCode: 'USD',
                                    total: {
                                        amount: '1.00',
                                        label: 'Total',
                                    },
                                },
                            });

                            document.getElementById('wallet-button').appendChild(googlePayButton);

                            googlePayButton.addEventListener('click', async function (event) {
                                try {
                                    const result = await wallet.tokenize({
                                        request: {
                                            countryCode: 'US',
                                            currencyCode: 'USD',
                                            total: {
                                                amount: '1.00',
                                                label: 'Total',
                                            },
                                        },
                                    });

                                    if (result.status === 'OK') {
                                        fetch('/process-payment', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            },
                                            body: JSON.stringify({ nonce: result.token }),
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                window.location.href = '/afterPurchase';
                                            } else {
                                                alert('Payment failed: ' + data.message);
                                            }
                                        });
                                    } else {
                                        alert('Failed to tokenize Google Pay: ' + result.errors[0].detail);
                                    }
                                } catch (e) {
                                    console.error(e);
                                    alert('Error occurred: ' + e.message);
                                }
                            });
                        } else {
                            alert('Google Pay is not supported on this device.');
                        }
                    });
                </script>

            @else
                <p class="mt-3">No items in cart yet!</p>
            @endif
        </div>
    </footer>

@endsection
