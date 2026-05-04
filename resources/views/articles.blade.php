@extends('layouts.main')

@section('content')
<style>
    /* Gaya gelap elegan - Rosegold & Abu-abu (konsisten dengan halaman lain) */
    .articles-wrapper {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .articles-wrapper::before {
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

    .articles-wrapper::after {
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

    .articles-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    /* Header */
    .articles-header {
        text-align: center;
        margin-bottom: 2.5rem;
        background: rgba(20, 20, 35, 0.4);
        backdrop-filter: blur(8px);
        border-radius: 1.5rem;
        padding: 1.5rem;
        border: 1px solid rgba(212, 160, 168, 0.2);
    }

    .articles-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 0.5rem;
    }

    .articles-header p {
        font-family: 'Poppins', sans-serif;
        color: #b0b0c0;
        font-size: 0.9rem;
    }

    .articles-header .divider {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #b76e79, #d4a0a8);
        margin: 0.8rem auto 0;
        border-radius: 2px;
    }

    /* Kartu artikel mewah (gelap) */
    .article-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(212, 160, 168, 0.25);
        border-radius: 1.5rem;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .article-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 35px -12px rgba(192, 110, 123, 0.25);
        border-color: rgba(212, 160, 168, 0.6);
        background: rgba(20, 20, 35, 0.8);
    }

    .article-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid rgba(212, 160, 168, 0.2);
        transition: transform 0.3s ease;
    }

    .article-card:hover .article-img {
        transform: scale(1.02);
    }

    .article-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .article-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #e0e0e8;
        margin-bottom: 0.75rem;
        line-height: 1.4;
        transition: color 0.2s;
    }

    .article-card:hover .article-title {
        color: #d4a0a8;
    }

    .article-excerpt {
        font-family: 'Inter', sans-serif;
        color: #b0b0c0;
        font-size: 0.85rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }

    .btn-read {
        background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
        background-size: 150% auto;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.8rem;
        color: #12121c;
        transition: all 0.3s ease;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: fit-content;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(192, 110, 123, 0.25);
    }

    .btn-read:hover {
        background-position: right center;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(192, 110, 123, 0.4);
        color: #0a0a14;
    }

    /* Pagination mewah gelap */
    .pagination-luxury {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .pagination-luxury .pagination {
        gap: 0.3rem;
    }

    .pagination-luxury .page-link {
        background: rgba(30, 30, 50, 0.7);
        border: 1px solid rgba(212, 160, 168, 0.3);
        border-radius: 40px !important;
        padding: 0.5rem 1rem;
        color: #d4a0a8;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        transition: all 0.2s;
    }

    .pagination-luxury .page-link:hover {
        background: linear-gradient(105deg, #b76e79, #d4a0a8);
        border-color: transparent;
        color: #12121c;
        transform: translateY(-2px);
    }

    .pagination-luxury .active .page-link {
        background: linear-gradient(105deg, #b76e79, #d4a0a8);
        border-color: transparent;
        color: #12121c;
        box-shadow: 0 4px 10px rgba(192, 110, 123, 0.3);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 2.5rem;
        background: rgba(20, 20, 35, 0.5);
        backdrop-filter: blur(8px);
        border-radius: 1.8rem;
        border: 1px solid rgba(212, 160, 168, 0.25);
    }

    .empty-state h4 {
        color: #d4a0a8;
        margin-top: 1rem;
        font-family: 'Playfair Display', serif;
    }

    .empty-state p {
        color: #b0b0c0;
    }

    @media (max-width: 768px) {
        .articles-header h2 {
            font-size: 1.8rem;
        }
        .article-title {
            font-size: 1.1rem;
        }
        .btn-read {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="articles-wrapper">
    <div class="articles-container">
        <!-- Header -->
        <div class="articles-header">
            <h2>Kumpulan Artikel</h2>
            <p>Temukan berbagai artikel menarik seputar web development</p>
            <div class="divider"></div>
        </div>

        <!-- Grid artikel -->
        <div class="row g-4">
            @forelse ($artikels as $item)
            <div class="col-md-6 col-lg-4">
                <div class="article-card">
                    @if($item->gambar_url)
                        <img src="{{ $item->gambar_url }}" class="article-img" alt="{{ $item->judul }}">
                    @else
                        <div class="article-img" style="background: linear-gradient(135deg, #2a2a3e, #1a1a2e); display: flex; align-items: center; justify-content: center; color: #8a8aaa; font-size: 0.8rem;">
                            No Image
                        </div>
                    @endif

                    <div class="article-body">
                        <h5 class="article-title">{{ $item->judul }}</h5>
                        <div class="article-excerpt">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                        </div>
                        <a href="/articles/{{ $item->slug ?? $item->id }}" class="btn-read">
                            Baca Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <span style="font-size: 2.5rem; opacity: 0.6;">📄</span>
                    <h4>Belum ada artikel</h4>
                    <p>Silakan tambah artikel baru melalui halaman admin.</p>
                    <a href="/admin/artikel/create" class="btn-read mt-2" style="display: inline-block;">+ Tambah Artikel</a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($artikels, 'links') && $artikels->hasPages())
        <div class="pagination-luxury mt-5">
            {{ $artikels->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>
@endsection