<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffeef5;
        }
        .navbar {
            background-color: #ffb6c1;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-item {
            margin-right: 10px;
        }
        .navbar-nav .nav-item:last-child {
            margin-right: 0;
        }
        .banner {
            background-color: #ffc0cb;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .card {
            border: none;
        }
        .card-title {
            color: #ff6f91;
        }
        .card-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header class="py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">
                    <img src="path/to/logo.png" alt="Pet Shop Logo" style="height: 40px; margin-right: 10px;">
                    Pet Shop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about-us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/storepage">Storepage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/forum">Forum</a>
                        </li>
                        <li class="nav-item">
                            <span class="navbar-text">|</span>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="nav-link btn btn-link" type="submit">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
