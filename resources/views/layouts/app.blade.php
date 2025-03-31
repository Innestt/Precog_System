<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'precog') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Sidebar customization */
        .offcanvas-body {
            background-color: #f1f1f1; /* Light grey background */
        }

        .offcanvas-body ul li {
            font-size: 18px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .offcanvas-body ul li a {
            color: #333; /* Darker text color for contrast */
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: font-size 0.3s ease, color 0.3s ease;
        }

        .offcanvas-body ul li a i {
            color: #333; /* Dark grey for icons */
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        /* Hover effect */
        .offcanvas-body ul li a:hover {
            color: #fff; /* White text on hover */
            background-color: #5d2f7e; /* Purple background on hover */
            border-radius: 5px;
            font-size: 22px;
        }

        .offcanvas-body ul li a:hover i {
            color: #fff;
        }

        .offcanvas-body ul li a:hover::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background-color: #5d2f7e; /* Purple bar */
            margin-top: 5px;
        }

        /* Sidebar background */
        .offcanvas {
            background-color: #f1f1f1; /* Light grey background */
        }

        /* Top divider color */
        .offcanvas-header {
            background-color: #5d2f7e;
        }

        /* Close button color */
        .btn-close {
            color: #fff; /* White close button */
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #560084;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #fff;">{{ config('app.name', 'Precog') }}</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="color: #fff;">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #fff;">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>

            <button class="btn btn-outline-light ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color: #fff; border-color: #fff;">
                <i class="fas fa-bars"></i> Menu
            </button>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 200px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">
                <i class="bi bi-three-dots-vertical" style="font-size: 24px; margin-right: 10px;color:white;"></i> Menu
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Purple line inside sidebar -->
        <div style="border-top: 3px solid #5d2f7e;"></div>

        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <!-- Links with hover effect -->
                <li>
                    <a href="{{ url('/home') }}">
                        <i class="fas fa-home" style="font-size: 24px; margin-right: 10px;"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/search') }}">
                        <i class="fas fa-search" style="font-size: 24px; margin-right: 10px;"></i> Predict
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/about') }}">
                        <i class="fas fa-info-circle" style="font-size: 24px; margin-right: 10px;"></i> About
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}">
                        <i class="fas fa-phone" style="font-size: 24px; margin-right: 10px;"></i> Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
