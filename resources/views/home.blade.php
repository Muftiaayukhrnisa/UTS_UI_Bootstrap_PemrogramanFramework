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

    /* Gambar menyatu dengan background - posisi absolut di kanan, dengan mask gradasi */
    .hero-bg-image {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 55%;
        background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        /* Mask gradasi dari kiri (transparan) ke kanan (solid) sehingga gambar menyatu dengan background */
        -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 25%, #000 100%);
        mask-image: linear-gradient(to right, transparent 0%, #000 25%, #000 100%);
        z-index: 1;
    }

    /* Efek ornamen latar (tetap di belakang) */
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
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .two-col-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 0;
        align-items: stretch;
    }

    /* KOLOM KIRI: Teks tanpa bingkai kotak (tanpa background, blur, border, shadow) */
    .left-col {
        flex: 1;
        min-width: 280px;
        padding: 2rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Tidak ada background, backdrop-filter, border, atau box-shadow */
        z-index: 2;
    }

    /* KOLOM KANAN: Kosong, hanya sebagai penyeimbang layout */
    .right-col {
        flex: 1;
        min-width: 280px;
        position: relative;
        z-index: 2;
    }

    /* Gaya teks kiri (elegan, kontras dengan background gelap) */
    .badge-rose-dark {
        display: inline-block;
        background: transparent; /* hilangkan background */
        padding: 0.4rem 0; /* hilangkan padding horizontal agar tidak seperti kotak */
        border: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.7rem;
        letter-spacing: 1.5px;
        color: #d4a0a8;
        margin-bottom: 1.8rem;
        width: fit-content;
    }

    .title-dark-rose {
        font-family: 'Playfair Display', serif;
        font-size: 3.2rem;
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
        color: #e8e8f0;
        margin: 1.2rem 0 2rem;
        text-shadow: 0 1px 2px rgba(0,0,0,0.3);
    }

    .divider-dark {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #d4a0a8, #a0a0c0);
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
        box-shadow: 0 8px 18px -6px rgba(192,110,123,0.4);
        letter-spacing: 0.3px;
        width: fit-content;
    }

    .btn-rose-dark:hover {
        background-position: right center;
        transform: translateY(-3px);
        box-shadow: 0 15px 25px -8px rgba(192,110,123,0.6);
        color: #0a0a14;
    }

    .btn-rose-dark svg {
        transition: transform 0.2s;
    }

    .btn-rose-dark:hover svg {
        transform: translateX(5px);
    }

    /* Responsif */
    @media (max-width: 768px) {
        .hero-bg-image {
            width: 100%;
            -webkit-mask-image: linear-gradient(to bottom, transparent 0%, #000 20%, #000 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, #000 20%, #000 100%);
        }
        .two-col-layout {
            flex-direction: column;
        }
        .left-col {
            padding: 2rem 1.5rem;
        }
        .right-col {
            display: none;
        }
        .title-dark-rose {
            font-size: 2.2rem;
        }
        .container-2col {
            padding: 1rem;
        }
    }
</style>

<div class="hero-dark-rose">
    <!-- Gambar menyatu dengan background via mask gradasi -->
    <div class="hero-bg-image"></div>

    <div class="container-2col">
        <div class="two-col-layout">
            <!-- KOLOM KIRI: Teks tanpa bingkai kotak (background/border sudah dihapus) -->
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

            <!-- KOLOM KANAN: Kosong, menjaga proporsi layout -->
            <div class="right-col"></div>
        </div>
    </div>
</div>
@endsection