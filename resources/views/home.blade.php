@extends('layouts.main')

@section('content')
<style>
    /* Perpaduan Rosegold & Abu-abu - Latar Gelap, Elegan */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap');

    .hero-dark-rose {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-dark-rose::before {
        content: "";
        position: absolute;
        top: -150px;
        right: -100px;
        width: 450px;
        height: 450px;
        background: radial-gradient(circle, rgba(192, 110, 123, 0.12), transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .hero-dark-rose::after {
        content: "";
        position: absolute;
        bottom: -100px;
        left: -80px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(128, 128, 128, 0.08), transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .container-2col {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .two-col-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 3rem;
        align-items: center;
    }

    .left-col {
        flex: 1.2;
        min-width: 280px;
        text-align: left;
    }

    .right-col {
        flex: 0.8;
        min-width: 260px;
        background: rgba(20, 20, 35, 0.5);
        backdrop-filter: blur(8px);
        border-radius: 28px;
        padding: 1.8rem;
        border: 1px solid rgba(212, 160, 168, 0.3);
        box-shadow: 0 15px 30px -10px rgba(0,0,0,0.3);
    }

    .badge-rose-dark {
        display: inline-block;
        background: rgba(212, 160, 168, 0.15);
        padding: 0.4rem 1.2rem;
        border-radius: 50px;
        border: 1px solid rgba(212, 160, 168, 0.4);
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.7rem;
        letter-spacing: 1.5px;
        color: #d4a0a8;
        margin-bottom: 1.8rem;
    }

    .title-dark-rose {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 1rem;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .desc-dark-rose {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        line-height: 1.6;
        color: #c0c0d0;
        margin: 1.2rem 0 2rem;
    }

    .divider-dark {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #d4a0a8, #6c6c8c);
        margin: 1rem 0 1.5rem;
        border-radius: 2px;
    }

    .btn-rose-dark {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
        background-size: 150% auto;
        border: none;
        padding: 0.8rem 2.2rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        color: #12121c;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 18px -6px rgba(192,110,123,0.3);
        letter-spacing: 0.3px;
    }

    .btn-rose-dark:hover {
        background-position: right center;
        transform: translateY(-3px);
        box-shadow: 0 15px 25px -8px rgba(192,110,123,0.5);
        color: #0a0a14;
    }

    .btn-rose-dark svg {
        transition: transform 0.2s;
    }

    .btn-rose-dark:hover svg {
        transform: translateX(5px);
    }

    /* Gaya baru untuk kolom kanan: poin-poin rapi */
    .right-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: #e0a0b0;
        margin-bottom: 1.5rem;
        border-left: 3px solid #d4a0a8;
        padding-left: 0.8rem;
    }

    .benefit-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .benefit-item {
        font-family: 'Poppins', sans-serif;
        font-size: 0.85rem;
        color: #c0c0d0;
        line-height: 1.4;
        padding: 0.4rem 0;
        border-bottom: 1px dashed rgba(212,160,168,0.2);
    }

    .benefit-item:last-child {
        border-bottom: none;
    }

    @media (max-width: 768px) {
        .two-col-layout {
            flex-direction: column;
        }
        .title-dark-rose {
            font-size: 2.3rem;
        }
        .right-col {
            width: 100%;
        }
    }
</style>

<div class="hero-dark-rose">
    <div class="container-2col">
        <div class="two-col-layout">
            <!-- Kolom Kiri -->
            <div class="left-col">
                <div class="badge-rose-dark">RUANG IDE DIGITAL</div>
                <h1 class="title-dark-rose">
                    Selamat Datang di MutiBlog
                </h1>
                <div class="divider-dark"></div>
                <p class="desc-dark-rose">
                    Kumpulan artikel yang penuh dengan ide-ide segar dan inspirasi digital untuk mengembangkan potensi kreatifmu.<br>
                    Temukan wawasan baru, cerita inovatif, dan pemikiran visioner dari para kreator.
                </p>
                <a href="/articles" class="btn-rose-dark">
                    Jelajahi Artikel
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <!-- Kolom Kanan: diganti dengan poin-poin rapi -->
            <div class="right-col">
                <div class="right-title">Inspirasi Digital</div>
                <div class="benefit-list">
                    <div class="benefit-item">Ide segar setiap minggu yang membangkitkan kreativitas</div>
                    <div class="benefit-item">Perspektif baru dari para pemikir digital</div>
                    <div class="benefit-item">Wawasan praktis untuk mewujudkan inovasi</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection