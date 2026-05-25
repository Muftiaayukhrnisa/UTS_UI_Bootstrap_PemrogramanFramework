@extends('layouts.main')

@section('content')
<style>
    .kategori-page {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }
    .kategori-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    .kategori-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 0.5rem;
    }
    .kategori-header p {
        color: #b0b0c0;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
    }
    .kategori-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
    }
    .kategori-card {
        position: relative;
        background-size: cover;
        background-position: center;
        border-radius: 1.5rem;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        min-width: 280px;
        height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .kategori-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        transition: background 0.3s ease;
        z-index: 1;
    }
    .kategori-card:hover::before {
        background: rgba(0, 0, 0, 0.3);
    }
    .kategori-card a {
        position: relative;
        z-index: 2;
        text-decoration: none;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        padding: 1rem;
        transition: transform 0.3s ease;
    }
    .kategori-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.3);
    }
    .kategori-card:hover a {
        transform: scale(1.05);
    }
    .kategori-card.pendidikan {
        background-image: url('https://plus.unsplash.com/premium_photo-1677567996070-68fa4181775a?w=600&auto=format');
    }
    .kategori-card.kesehatan {
        background-image: url('https://plus.unsplash.com/premium_photo-1682310231531-148748e7684f?w=600&auto=format');
    }
    .kategori-card.digital {
        background-image: url('https://plus.unsplash.com/premium_photo-1661878265739-da90bc1af051?w=600&auto=format');
    }
    @media (max-width: 768px) {
        .kategori-grid {
            gap: 1rem;
        }
        .kategori-card {
            min-width: 240px;
            height: 260px;
        }
        .kategori-card a {
            font-size: 1.4rem;
        }
    }
</style>

<div class="kategori-page">
    <div class="kategori-header" data-aos="fade-up" data-aos-duration="800">
        <h1>Pilih Kategori Artikel</h1>
        <p>Telusuri artikel menarik berdasarkan minat Anda</p>
    </div>

    <div class="kategori-grid">
        <div class="kategori-card pendidikan" data-aos="flip-left" data-aos-delay="100" data-aos-duration="600">
            <a href="{{ route('artikel.kategori', 'Pendidikan') }}">Pendidikan</a>
        </div>
        <div class="kategori-card kesehatan" data-aos="flip-left" data-aos-delay="200" data-aos-duration="600">
            <a href="{{ route('artikel.kategori', 'Kesehatan') }}">Kesehatan</a>
        </div>
        <div class="kategori-card digital" data-aos="flip-left" data-aos-delay="300" data-aos-duration="600">
            <a href="{{ route('artikel.kategori', 'Dunia Digital') }}">Dunia Digital</a>
        </div>
    </div>
</div>
@endsection