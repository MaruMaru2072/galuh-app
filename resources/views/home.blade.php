@extends('layouts.app')

@section('content')
<div class="banner">
    <h1>Welcome to Our Pet Shop</h1>
    <p>Your one-stop shop for all your pet needs</p>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="path/to/online-pickup-service.jpg" class="card-img-top card-img" alt="Online Pickup Service">
                <div class="card-body">
                    <h5 class="card-title">Online Pickup Service</h5>
                    <p class="card-text">Order online and pick up in store.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="path/to/pet-sitter-forum.jpg" class="card-img-top card-img" alt="Pet Sitter Forum">
                <div class="card-body">
                    <h5 class="card-title">Pet Sitter Forum</h5>
                    <p class="card-text">Connect with pet sitters in your area.</p>
                    <a href="#" class="btn btn-primary">Join Forum</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="path/to/pet-quotes.jpg" class="card-img-top card-img" alt="Pet Quotes">
                <div class="card-body">
                    <h5 class="card-title">Pet Quotes</h5>
                    <p class="card-text">Get inspired by our collection of pet quotes.</p>
                    <a href="#" class="btn btn-primary">Read Quotes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
