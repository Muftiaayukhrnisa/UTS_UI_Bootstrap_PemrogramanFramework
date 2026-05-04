@extends('layouts.main')

@section('content')
<style>
    /* Gaya spesifik untuk halaman profil tanpa foto & sosmed */
    .profile-header {
        background: linear-gradient(135deg, rgba(219,39,119,0.08), rgba(37,99,235,0.08));
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border-radius: 2rem;
        border: 1px solid rgba(219, 39, 119, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
        max-width: 700px;
        margin: 0 auto;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 35px -12px rgba(219, 39, 119, 0.2);
        border-color: rgba(37, 99, 235, 0.4);
    }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, rgba(219,39,119,0.15), rgba(37,99,235,0.15));
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-weight: 600;
        color: #db2777;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        margin-bottom: 0.2rem;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: #1e293b;
        border-bottom: 1px dashed rgba(37,99,235,0.2);
        padding-bottom: 0.5rem;
    }

    @media (max-width: 640px) {
        .profile-card {
            margin: 0 1rem;
        }
        .info-value {
            font-size: 1rem;
        }
    }
</style>

<section class="container py-5">
    <div class="profile-header text-center">
        <h1 class="display-5 fw-bold" style="background: linear-gradient(115deg, #db2777, #2563eb); background-clip: text; -webkit-background-clip: text; color: transparent;">
            Profil Penulis
        </h1>
        <p class="text-secondary">Mengenal lebih dekat kreator di balik MutiBlog</p>
        <div style="width: 60px; height: 3px; background: linear-gradient(90deg, #db2777, #2563eb); margin: 0.5rem auto; border-radius: 2px;"></div>
    </div>

    <div class="profile-card p-4 p-md-5">
        <div class="info-row">
            <div class="info-icon">👤</div>
            <div class="info-content">
                <div class="info-label">NAMA LENGKAP</div>
                <div class="info-value">{{ $data['name'] }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon">✉️</div>
            <div class="info-content">
                <div class="info-label">EMAIL</div>
                <div class="info-value">{{ $data['email'] }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon">🏠</div>
            <div class="info-content">
                <div class="info-label">ALAMAT</div>
                <div class="info-value">{{ $data['address'] }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon">🎓</div>
            <div class="info-content">
                <div class="info-label">UNIVERSITAS</div>
                <div class="info-value">{{ $data['univ'] }}</div>
            </div>
        </div>
    </div>

    <!-- Tambahan kutipan penulis -->
    <div class="text-center mt-5">
        <p class="fst-italic text-secondary" style="font-size: 0.9rem;">
            "Membagikan ilmu melalui tulisan adalah bentuk investasi terbaik untuk masa depan"
        </p>
    </div>
</section>
@endsection