<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>MutiBlog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts (mewah) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #fef5f7 0%, #eef2ff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar mewah dengan efek glass + gradien biru-pink */
        .navbar-luxury {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            box-shadow: 0 8px 25px -8px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(219, 39, 119, 0.15);
            padding: 0.8rem 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 700;
            background: linear-gradient(135deg, #db2777, #2563eb);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #334155;
            transition: all 0.2s ease;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            margin: 0 0.1rem;
        }

        .navbar-nav .nav-link:hover {
            background: linear-gradient(105deg, #ffe4ec, #e0e7ff);
            color: #db2777;
            transform: translateY(-1px);
        }

        /* Tombol aktif / home bisa ditambahkan class active jika diperlukan */
        .navbar-nav .nav-link.active {
            background: linear-gradient(105deg, #db2777, #2563eb);
            color: white;
            box-shadow: 0 4px 12px rgba(219, 39, 119, 0.25);
        }

        /* Main content */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        /* Footer mewah */
        .footer-luxury {
            background: linear-gradient(95deg, #1e1e2f 0%, #16213e 100%);
            color: #e2e8f0;
            border-top: 1px solid rgba(219, 39, 119, 0.3);
            padding: 2rem 0;
            margin-top: auto;
        }

        .footer-luxury small {
            font-weight: 300;
            letter-spacing: 0.3px;
        }

        .footer-luxury a {
            color: #f472b6;
            text-decoration: none;
            transition: 0.2s;
        }

        .footer-luxury a:hover {
            color: #60a5fa;
            text-decoration: underline;
        }

        /* Efek custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #db2777, #2563eb);
            border-radius: 10px;
        }

        /* Card style untuk konten (optional, biar rapi jika ada card di yield) */
        .card-modern {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(219,39,119,0.2);
            border-radius: 24px;
            transition: all 0.25s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        }
        .card-modern:hover {
            transform: translateY(-5px);
            border-color: rgba(37,99,235,0.3);
            box-shadow: 0 20px 30px -12px rgba(219,39,119,0.15);
            background: rgba(255,255,255,0.9);
        }

        /* Tombol umum */
        .btn-pink-blue {
            background: linear-gradient(105deg, #db2777, #2563eb);
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 40px;
            font-weight: 600;
            color: white;
            transition: 0.2s;
            box-shadow: 0 6px 14px rgba(37,99,235,0.25);
        }
        .btn-pink-blue:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(219,39,119,0.3);
            color: white;
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
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-luxury fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">MutiBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto gap-2 gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="/articles">Articles</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/artikel">Admin</a></li>
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
            <a href="#" class="text-decoration-none">Laravel ❤️</a> 
            <span class="mx-1">•</span> 
            <span style="color: #f472b6;"></span>
        </small>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>