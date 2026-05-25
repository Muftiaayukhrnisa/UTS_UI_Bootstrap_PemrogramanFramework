@extends('layouts.main')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .author-container {
        max-width: 800px;
        margin: 2rem auto;
        background: rgba(20,20,35,0.7);
        backdrop-filter: blur(12px);
        border-radius: 32px;
        border: 1px solid rgba(212,160,168,0.3);
        padding: 2rem;
        box-shadow: 0 25px 45px rgba(0,0,0,0.4);
    }
    .author-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    .avatar-large {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #b76e79, #d4a0a8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: bold;
        color: #12121c;
        font-family: 'Playfair Display', serif;
        margin: 0 auto 1rem;
        text-transform: uppercase;
    }
    .author-name {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }
    .author-role {
        color: #b0b0c0;
        font-size: 0.9rem;
        margin-top: 0.25rem;
    }
    .info-card {
        background: rgba(15,15,25,0.6);
        border-radius: 24px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }
    .info-item {
        display: flex;
        border-bottom: 1px solid rgba(212,160,168,0.2);
        padding: 1rem 0;
    }
    .info-item:last-child {
        border-bottom: none;
    }
    .info-label {
        width: 140px;
        font-weight: 600;
        color: #d4a0a8;
        font-size: 0.9rem;
    }
    .info-value {
        flex: 1;
        color: #f0f0f0;
        font-size: 0.9rem;
    }
    .btn-back {
        display: inline-block;
        margin-top: 1.5rem;
        text-align: center;
        background: rgba(212,160,168,0.2);
        border: 1px solid #d4a0a8;
        padding: 0.6rem 1.5rem;
        border-radius: 40px;
        color: #d4a0a8;
        text-decoration: none;
        transition: 0.2s;
    }
    .btn-back:hover {
        background: #d4a0a8;
        color: #12121c;
    }
    @media (max-width: 600px) {
        .info-item {
            flex-direction: column;
            gap: 0.5rem;
        }
        .info-label {
            width: 100%;
        }
        .author-container {
            padding: 1.5rem;
            margin: 1rem;
        }
    }
</style>

<div class="author-container" data-aos="fade-up" data-aos-duration="800">
    <div class="author-header" data-aos="zoom-in" data-aos-delay="100">
        <div class="avatar-large">
            {{ substr($author['name'], 0, 1) }}
        </div>
        <h1 class="author-name">{{ $author['name'] }}</h1>
        <div class="author-role">✍️ Penulis & Creator MutiBlog</div>
    </div>

    <div class="info-card" data-aos="fade-up" data-aos-delay="200">
        <div class="info-item" data-aos="fade-right" data-aos-delay="300">
            <div class="info-label">📧 Email</div>
            <div class="info-value">{{ $author['email'] }}</div>
        </div>
        <div class="info-item" data-aos="fade-right" data-aos-delay="350">
            <div class="info-label">🎓 Pendidikan</div>
            <div class="info-value">{{ $author['education'] }}</div>
        </div>
        <div class="info-item" data-aos="fade-right" data-aos-delay="400">
            <div class="info-label">📅 Umur</div>
            <div class="info-value">{{ $author['age'] }}</div>
        </div>
        <div class="info-item" data-aos="fade-right" data-aos-delay="450">
            <div class="info-label">📍 Tempat, Tanggal Lahir</div>
            <div class="info-value">{{ $author['birth'] }}</div>
        </div>
    </div>

    <div style="text-align: center;" data-aos="fade-up" data-aos-delay="500">
        <a href="{{ route('home') }}" class="btn-back">← Kembali ke Beranda</a>
    </div>
</div>
@endsection