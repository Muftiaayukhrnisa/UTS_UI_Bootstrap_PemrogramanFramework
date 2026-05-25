@extends('layouts.main')

@section('content')
<style>
    /* Gaya untuk halaman kategori artikel */
    .kategori-page {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    .kategori-header {
        margin-bottom: 2rem;
        text-align: left;
        border-left: 4px solid #d4a0a8;
        padding-left: 1.2rem;
    }

    .kategori-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin: 0;
    }

    /* Grid artikel */
    .article-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    /* Kartu artikel */
    .article-card {
        background: rgba(20, 20, 35, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(212, 160, 168, 0.3);
        border-radius: 1.5rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .article-card:hover {
        transform: translateY(-6px);
        border-color: rgba(212, 160, 168, 0.7);
        box-shadow: 0 20px 30px -12px rgba(192, 110, 123, 0.3);
    }

    /* Gambar artikel */
    .article-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #0f0f1a;
        display: block;
        border-bottom: 1px solid rgba(212, 160, 168, 0.2);
    }

    /* Body kartu */
    .article-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .article-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: #f0f0f5;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    /* Meta informasi (tanggal dan views) */
    .article-meta {
        font-size: 0.75rem;
        color: #b8b8d0;
        margin-bottom: 1.5rem;
        display: flex;
        gap: 1rem;
        font-family: 'Poppins', sans-serif;
        border-bottom: 1px dashed rgba(212, 160, 168, 0.3);
        padding-bottom: 0.75rem;
    }

    /* Tombol baca selengkapnya */
    .btn-read-more {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(105deg, #b76e79, #d4a0a8);
        background-size: 150% auto;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.8rem;
        color: #12121c;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(192, 110, 123, 0.3);
        width: fit-content;
        cursor: pointer;
        margin-top: auto;
    }

    .btn-read-more:hover {
        background-position: right center;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(192, 110, 123, 0.5);
        color: #0a0a14;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: rgba(20, 20, 35, 0.4);
        border-radius: 1.5rem;
        margin-top: 2rem;
    }

    .empty-state p {
        color: #c0c0d0;
        font-size: 1rem;
    }

    /* Pagination */
    .pagination-luxury {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination-luxury .pagination {
        gap: 0.3rem;
    }

    .pagination-luxury .page-link {
        background: rgba(30, 30, 50, 0.7);
        border: 1px solid rgba(212, 160, 168, 0.3);
        border-radius: 40px !important;
        color: #d4a0a8;
        font-family: 'Poppins', sans-serif;
        transition: 0.2s;
    }

    .pagination-luxury .page-link:hover {
        background: #b76e79;
        border-color: #b76e79;
        color: #12121c;
    }

    .pagination-luxury .active .page-link {
        background: linear-gradient(105deg, #b76e79, #d4a0a8);
        border-color: transparent;
        color: #12121c;
    }

    @media (max-width: 640px) {
        .article-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        .kategori-page {
            padding: 0 1rem;
        }
        .article-title {
            font-size: 1.2rem;
        }
        .btn-read-more {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }
    }
</style>

<div class="kategori-page">
    <div class="kategori-header" data-aos="fade-right" data-aos-duration="600">
        <h1>Kategori: {{ ucfirst($kategori) }}</h1>
    </div>

    <div class="article-grid">
        @forelse ($artikels as $index => $artikel)
        <div class="article-card" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}" data-aos-duration="600">
            @if($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="article-img" alt="{{ $artikel->judul }}">
            @else
                <img src="https://via.placeholder.com/400x200?text=No+Image" class="article-img" alt="placeholder">
            @endif
            <div class="article-body">
                <h3 class="article-title">{{ $artikel->judul }}</h3>
                <div class="article-meta">
                    <span>{{ $artikel->created_at->format('d M Y') }}</span>
                    <span>👁️ {{ number_format($artikel->views) }}</span>
                </div>
                <a href="{{ route('articles.show', $artikel->slug) }}" class="btn-read-more">
                    Baca selengkapnya →
                </a>
            </div>
        </div>
        @empty
        <div class="empty-state" data-aos="fade-up" data-aos-delay="100">
            <p>📭 Belum ada artikel dalam kategori <strong>{{ ucfirst($kategori) }}</strong>.</p>
            <p style="font-size: 0.85rem;">Silakan kunjungi kategori lain atau kembali nanti.</p>
        </div>
        @endforelse
    </div>

    @if(method_exists($artikels, 'links') && $artikels->hasPages())
    <div class="pagination-luxury" data-aos="fade-up" data-aos-delay="200">
        {{ $artikels->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection