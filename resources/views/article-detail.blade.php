@extends('layouts.main')

@section('content')
<style>
    /* Gaya spesifik untuk halaman detail artikel */
    .detail-header {
        background: linear-gradient(135deg, rgba(219,39,119,0.08), rgba(37,99,235,0.08));
        border-radius: 2rem;
        padding: 1rem 2rem;
        margin-bottom: 2rem;
    }

    .article-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border-radius: 2rem;
        border: 1px solid rgba(219, 39, 119, 0.2);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .article-card:hover {
        box-shadow: 0 20px 35px -12px rgba(219, 39, 119, 0.2);
        border-color: rgba(37, 99, 235, 0.4);
    }

    .article-img {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
        border-bottom: 1px solid rgba(219,39,119,0.2);
    }

    .article-title {
        font-size: 2.2rem;
        font-weight: 800;
        background: linear-gradient(115deg, #1e1e2f, #db2777, #2563eb);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 1rem;
    }

    .meta-info {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px dashed rgba(37,99,235,0.2);
    }

    .meta-item {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(219,39,119,0.08);
        padding: 0.3rem 1rem;
        border-radius: 40px;
        font-size: 0.85rem;
        color: #db2777;
        font-weight: 500;
    }

    .article-content {
        line-height: 1.8;
        color: #1e293b;
        font-size: 1.05rem;
        text-align: justify;
    }

    .btn-back {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(219,39,119,0.3);
        padding: 0.6rem 1.5rem;
        border-radius: 40px;
        font-weight: 500;
        color: #db2777;
        transition: 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-back:hover {
        background: rgba(219,39,119,0.1);
        border-color: #db2777;
        color: #c24573;
        transform: translateX(-3px);
    }

    @media (max-width: 768px) {
        .article-title {
            font-size: 1.6rem;
        }
        .meta-info {
            gap: 0.8rem;
        }
        .article-content {
            font-size: 0.95rem;
        }
    }
</style>

<section class="container py-5">
    <!-- Header dengan tombol back -->
    <div class="detail-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <a href="/articles" class="btn-back">
            ← Kembali ke Artikel
        </a>
        <div class="badge" style="background: linear-gradient(105deg, #db2777, #2563eb); color: white; padding: 0.5rem 1rem; border-radius: 40px;">
            Detail Artikel
        </div>
    </div>

    <!-- Kartu Artikel -->
    <div class="article-card">
        @if($artikel->gambar_url)
            <img src="{{ $artikel->gambar_url }}" class="article-img" alt="{{ $artikel->judul }}">
        @endif

        <div class="p-4 p-md-5">
            <h1 class="article-title">{{ $artikel->judul }}</h1>

            <div class="meta-info">
                <span class="meta-item">🏷️ {{ $artikel->kategori }}</span>
                <span class="meta-item">👁️ {{ number_format($artikel->views) }} x dilihat</span>
                <span class="meta-item">📅 {{ $artikel->created_at->format('d M Y') }}</span>
            </div>

            <div class="article-content">
                {!! nl2br(e($artikel->isi)) !!}
            </div>

            <!-- Opsi tambahan: tombol share atau navigasi (bisa ditambahkan jika perlu) -->
            <div class="mt-5 pt-3 text-center">
                <div style="width: 60px; height: 2px; background: linear-gradient(90deg, #db2777, #2563eb); margin: 0 auto 1.5rem auto;"></div>
                <p class="text-secondary fst-italic">Terima kasih telah membaca artikel ini 😊</p>
            </div>
        </div>
    </div>
</section>
@endsection