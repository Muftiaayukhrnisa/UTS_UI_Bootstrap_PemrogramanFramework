<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>MutiBlog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts (mewah) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar gelap mewah dengan efek glass - nuansa rosegold */
        .navbar-luxury {
            background: rgba(15, 15, 26, 0.85);
            backdrop-filter: blur(16px);
            box-shadow: 0 8px 25px -8px rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(212, 160, 168, 0.3);
            padding: 0.8rem 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 700;
            background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #c0c0d0;
            transition: all 0.2s ease;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            margin: 0 0.1rem;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(212, 160, 168, 0.15);
            color: #d4a0a8;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            background: linear-gradient(105deg, #b76e79, #d4a0a8);
            color: #12121c;
            box-shadow: 0 4px 12px rgba(192, 110, 123, 0.3);
        }

        /* Dropdown menu untuk user */
        .dropdown-menu {
            background: rgba(20, 20, 35, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(212, 160, 168, 0.3);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        .dropdown-menu .dropdown-item {
            color: #e8e8f0;
            font-weight: 500;
            transition: 0.2s;
        }
        .dropdown-menu .dropdown-item:hover {
            background: rgba(212, 160, 168, 0.2);
            color: #d4a0a8;
        }
        .btn-logout-dropdown {
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        /* Toggler button untuk mobile (warna rosegold) */
        .navbar-toggler {
            border-color: rgba(212, 160, 168, 0.5);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23d4a0a8' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Main content */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        /* Footer gelap elegan */
        .footer-luxury {
            background: linear-gradient(95deg, #0a0a14 0%, #12121e 100%);
            color: #8a8aaa;
            border-top: 1px solid rgba(212, 160, 168, 0.2);
            padding: 2rem 0;
            margin-top: auto;
        }

        .footer-luxury small {
            font-weight: 300;
            letter-spacing: 0.3px;
            font-family: 'Inter', sans-serif;
        }

        .footer-luxury a {
            color: #d4a0a8;
            text-decoration: none;
            transition: 0.2s;
        }

        .footer-luxury a:hover {
            color: #e0b0b8;
            text-decoration: underline;
        }

        /* Custom scrollbar dengan rosegold */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1a2e;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #b76e79, #d4a0a8);
            border-radius: 10px;
        }

        /* Card style umum */
        .card-modern {
            background: rgba(20, 20, 35, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(212, 160, 168, 0.25);
            border-radius: 24px;
            transition: all 0.25s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .card-modern:hover {
            transform: translateY(-5px);
            border-color: rgba(212, 160, 168, 0.5);
            box-shadow: 0 20px 30px -12px rgba(192, 110, 123, 0.2);
            background: rgba(20, 20, 35, 0.8);
        }

        /* Tombol umum */
        .btn-rosegold {
            background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
            background-size: 150% auto;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 40px;
            font-weight: 600;
            color: #12121c;
            transition: 0.2s;
            box-shadow: 0 6px 14px rgba(192, 110, 123, 0.25);
        }
        .btn-rosegold:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(192, 110, 123, 0.4);
            color: #0a0a14;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.4rem;
            }
            main {
                padding: 1rem 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-luxury fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">MutiBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto gap-2 gap-lg-3 align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">Artikel</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.artikel.index') }}">Admin</a></li>
                    @endauth
                    <li class="nav-item"><a class="nav-link" href="{{ route('profil.penulis') }}">Profil Penulis</a></li>

                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                👤 {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                                <li><hr class="dropdown-divider" style="border-color: rgba(212,160,168,0.3);"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item btn-logout-dropdown">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Spacer karena navbar fixed-top -->
<div style="height: 80px;"></div>

<main class="flex-grow-1">
    @yield('content')
</main>

<footer class="footer-luxury">
    <div class="container text-center">
        <small>
            &copy; 2026 MutiBlog. Built with 
            <a href="#" class="text-decoration-none">Laravel</a> 
            <span class="mx-1">•</span> 
            <span style="color: #d4a0a8;">MutiBlog</span>
        </small>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>