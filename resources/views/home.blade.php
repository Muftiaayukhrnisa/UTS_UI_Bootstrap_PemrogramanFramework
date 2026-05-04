@extends('layouts.main')

@section('content')
<style>
    /* Perpaduan Pink, Putih, Biru - Mewah & Berkelas (tanpa statistik) */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap');

    .hero-luxury {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(145deg, #ffffff 0%, #fef5f7 40%, #eef2ff 100%);
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    /* Dekorasi lingkaran mewah */
    .hero-luxury::before {
        content: "";
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(219, 39, 119, 0.08), transparent 70%);
        top: -150px;
        right: -100px;
        border-radius: 50%;
        z-index: 0;
    }

    .hero-luxury::after {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.06), transparent 70%);
        bottom: -200px;
        left: -150px;
        border-radius: 50%;
        z-index: 0;
    }

    .luxury-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .badge-luxury {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #fff, #f8f9ff);
        backdrop-filter: blur(8px);
        padding: 0.4rem 1.2rem;
        border-radius: 60px;
        border: 1px solid rgba(219, 39, 119, 0.2);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        margin-bottom: 1.8rem;
        font-size: 0.8rem;
        font-weight: 600;
        color: #be3b6b;
        letter-spacing: 0.5px;
    }

    .badge-luxury span {
        font-size: 1.1rem;
    }

    .main-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(115deg, #1e1e2f 20%, #be3b6b 50%, #2563eb 85%);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 1.2rem;
        letter-spacing: -0.02em;
    }

    .highlight-pink {
        background: linear-gradient(120deg, #db2777, #f472b6);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }

    .description {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #334155;
        max-width: 600px;
        margin: 0 auto 2.5rem auto;
        font-weight: 400;
    }

    /* Tombol utama - tengah, mewah */
    .btn-glimmer {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(105deg, #db2777 0%, #f472b6 40%, #2563eb 100%);
        background-size: 150% auto;
        border: none;
        padding: 0.9rem 2.8rem;
        border-radius: 60px;
        font-weight: 700;
        font-size: 1.05rem;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 15px 30px -12px rgba(37, 99, 235, 0.3);
        letter-spacing: 0.3px;
    }

    .btn-glimmer:hover {
        background-position: right center;
        transform: translateY(-3px);
        box-shadow: 0 25px 35px -12px rgba(219, 39, 119, 0.4);
        color: white;
    }

    .btn-glimmer svg {
        transition: transform 0.2s;
    }

    .btn-glimmer:hover svg {
        transform: translateX(5px);
    }

    /* Divider opsional (boleh dihilangkan jika tidak ingin) */
    .custom-divider {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #db2777, #2563eb);
        margin: 1rem auto 2rem auto;
        border-radius: 2px;
        opacity: 0.6;
    }

    @media (max-width: 640px) {
        .main-title {
            font-size: 2.3rem;
        }
        .btn-glimmer {
            padding: 0.7rem 2rem;
            font-size: 0.95rem;
        }
        .description {
            font-size: 1rem;
            padding: 0 1rem;
        }
    }
</style>

<div class="hero-luxury">
    <div class="luxury-container">
        <div class="badge-luxury">
            </span> PLATFORM BERBAGI PENGETAHUAN
        </div>

        <h1 class="main-title">
            Selamat Datang di <span class="highlight-pink">MutiBlog</span>
        </h1>

        <p class="description">
            Kumpulan artikel berkualitas seputar web development, dari pemula hingga mahir.<br>
            Ditulis oleh para praktisi, untuk pengembang masa depan.
        </p>

        <div class="custom-divider"></div>

        <!-- Hanya tombol Lihat Artikel, tanpa statistik dan tanpa Tentang Kami -->
        <a href="/articles" class="btn-glimmer">
            Lihat Artikel
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</div>
@endsection