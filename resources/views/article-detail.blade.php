@extends('layouts.main')

@section('content')
<style>
    /* Gaya gelap elegan - Rosegold & Abu-abu (konsisten dengan halaman lain) */
    .detail-wrapper {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .detail-wrapper::before {
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

    .detail-wrapper::after {
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

    .detail-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    /* Header dengan badge saja (tanpa tombol kembali) */
    .detail-header {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 2rem;
        background: rgba(20, 20, 35, 0.4);
        backdrop-filter: blur(8px);
        border-radius: 1.5rem;
        padding: 0.8rem 1.5rem;
        border: 1px solid rgba(212, 160, 168, 0.2);
    }

    .badge-detail {
        background: linear-gradient(105deg, #b76e79, #d4a0a8);
        padding: 0.4rem 1.2rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.7rem;
        letter-spacing: 0.5px;
        color: #12121c;
    }

    /* Kartu artikel */
    .article-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(12px);
        border-radius: 2rem;
        border: 1px solid rgba(212, 160, 168, 0.3);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .article-card:hover {
        box-shadow: 0 20px 35px -12px rgba(192, 110, 123, 0.2);
        border-color: rgba(212, 160, 168, 0.6);
    }

    .article-img {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
        border-bottom: 1px solid rgba(212, 160, 168, 0.3);
    }

    .article-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 1rem;
    }

    .meta-info {
        display: flex;
        flex-wrap: wrap;
        gap: 1.2rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px dashed rgba(212, 160, 168, 0.3);
    }

    .meta-item {
        font-family: 'Poppins', sans-serif;
        font-size: 0.8rem;
        color: #b0b0c0;
        background: rgba(212, 160, 168, 0.1);
        padding: 0.3rem 1rem;
        border-radius: 40px;
        font-weight: 500;
    }

    .article-content {
        font-family: 'Inter', sans-serif;
        line-height: 1.8;
        color: #c0c0d0;
        font-size: 1rem;
        text-align: justify;
    }

    .article-content p {
        margin-bottom: 1rem;
    }

    /* Footer artikel */
    .article-footer {
        margin-top: 2.5rem;
        padding-top: 1.5rem;
        text-align: center;
        border-top: 1px solid rgba(212, 160, 168, 0.2);
    }

    .footer-divider {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #b76e79, #d4a0a8);
        margin: 0 auto 1rem auto;
        border-radius: 2px;
    }

    .footer-quote {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: #8a8aaa;
        font-size: 0.85rem;
    }

    @media (max-width: 768px) {
        .article-title {
            font-size: 1.6rem;
        }
        .meta-info {
            gap: 0.8rem;
        }
        .meta-item {
            font-size: 0.7rem;
        }
        .article-content {
            font-size: 0.9rem;
        }
        .detail-header {
            justify-content: center;
        }
    }
</style>

<div class="detail-wrapper">
    <div class="detail-container">
        <!-- Header dengan badge (tanpa tombol kembali) -->
        <div class="detail-header">
            <div class="badge-detail">
                DETAIL ARTIKEL
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
                    <span class="meta-item">Kategori : {{ $artikel->kategori }}</span>
                    <span class="meta-item">{{ number_format($artikel->views) }} x dilihat</span>
                    <span class="meta-item">{{ $artikel->created_at->format('d M Y') }}</span>
                </div>

                <div class="article-content">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>

                <div class="article-footer">
                    <div class="footer-divider"></div>
                    <div class="footer-quote">
                        Terima kasih telah membaca artikel ini
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection