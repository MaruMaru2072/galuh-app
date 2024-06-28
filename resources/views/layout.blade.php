<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    </style>
</head>
<body>
    <header class="py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">
                    <img src="images/text.png" alt="Pet Shop Logo" style="height: 40px; margin-right: 10px;">
                    Galuh Petshop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about-us">About Us</a>
                        </li>
                        @auth
                            @if (Auth::user()->is_admin == true)
                                <li class="nav-item">
                                    <a class="nav-link" href="/manageProductPage">Manage Product</a>
                                </li>
                            @endif
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="/storepage">Storepage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/forum">Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/quotes">Quotes</a>
                        </li>
                        <li class="nav-item">
                            <span class="navbar-text">|</span>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">Profile Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cartPage">[Cart]</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/historyPage">Purchase History</a>
                            </li>
                            
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
