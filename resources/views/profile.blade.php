@extends('layouts.main')

@section('content')
<style>
    /* Gaya gelap elegan - Rosegold & Abu-abu (konsisten dengan halaman lain) */
    .profile-wrapper {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .profile-wrapper::before {
        content: "";
        position: absolute;
        top: -100px;
        right: -100px;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(192, 110, 123, 0.12), transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .profile-wrapper::after {
        content: "";
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(128, 128, 128, 0.08), transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 2rem;
        background: rgba(20, 20, 35, 0.4);
        backdrop-filter: blur(8px);
        border-radius: 1.5rem;
        padding: 1.5rem;
        border: 1px solid rgba(212, 160, 168, 0.2);
    }

    .profile-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 0.5rem;
    }

    .profile-header p {
        font-family: 'Poppins', sans-serif;
        color: #b0b0c0;
        font-size: 0.9rem;
    }

    .profile-header .divider {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #b76e79, #d4a0a8);
        margin: 0.8rem auto 0;
        border-radius: 2px;
    }

    /* Kartu profil */
    .profile-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(12px);
        border-radius: 1.8rem;
        border: 1px solid rgba(212, 160, 168, 0.3);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 35px -12px rgba(192, 110, 123, 0.2);
        border-color: rgba(212, 160, 168, 0.6);
    }

    /* Informasi tanpa ikon */
    .info-item {
        display: flex;
        align-items: baseline;
        flex-wrap: wrap;
        padding: 0.8rem 0;
        border-bottom: 1px solid rgba(212, 160, 168, 0.2);
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        width: 140px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #d4a0a8;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .info-value {
        flex: 1;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        font-weight: 500;
        color: #c0c0d0;
        padding-left: 1rem;
    }

    /* Kutipan */
    .profile-quote {
        text-align: center;
        margin-top: 2rem;
        padding: 1rem;
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: #8a8aaa;
        font-size: 0.85rem;
        border-top: 1px solid rgba(212, 160, 168, 0.2);
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 640px) {
        .profile-header h1 {
            font-size: 1.8rem;
        }
        .info-item {
            flex-direction: column;
            gap: 0.3rem;
        }
        .info-label {
            width: auto;
        }
        .info-value {
            padding-left: 0;
        }
    }
</style>

<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile-header">
            <h1>Profil Penulis</h1>
            <p>Mengenal lebih dekat kreator di balik MutiBlog</p>
            <div class="divider"></div>
        </div>

        <div class="profile-card p-4 p-md-5">
            <div class="info-item">
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value">{{ $data['name'] }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $data['email'] }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Alamat</div>
                <div class="info-value">{{ $data['address'] }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Universitas</div>
                <div class="info-value">{{ $data['univ'] }}</div>
            </div>
        </div>

        <div class="profile-quote">
            "Membagikan ilmu melalui tulisan adalah bentuk investasi terbaik untuk masa depan"
        </div>
    </div>
</div>
@endsection