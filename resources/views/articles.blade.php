@extends('layouts.main')

@section('content')
<style>
    /* Gaya spesifik untuk halaman kumpulan artikel */
    .articles-header {
        background: linear-gradient(135deg, rgba(219,39,119,0.08), rgba(37,99,235,0.08));
        border-radius: 2rem;
        padding: 1.5rem 2rem;
        margin-bottom: 2.5rem;
        text-align: center;
    }

    .articles-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(115deg, #db2777, #2563eb);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 0.5rem;
    }

    .articles-header p {
        color: #6c757d;
    }

    .articles-header .divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #db2777, #2563eb);
        margin: 0.8rem auto 0;
        border-radius: 3px;
    }

    /* Kartu artikel mewah */
    .article-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(219, 39, 119, 0.2);
        border-radius: 1.5rem;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px -12px rgba(219, 39, 119, 0.25);
        border-color: rgba(37, 99, 235, 0.4);
        background: rgba(255, 255, 255, 0.85);
    }

    .article-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid rgba(219,39,119,0.15);
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
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.4;
        transition: color 0.2s;
    }

    .article-card:hover .article-title {
        background: linear-gradient(115deg, #db2777, #2563eb);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }

    .article-excerpt {
        color: #475569;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }

    .btn-read {
        background: linear-gradient(105deg, #db2777, #2563eb);
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        color: white;
        transition: all 0.2s;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: fit-content;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(37,99,235,0.2);
    }

    .btn-read:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(219,39,119,0.3);
        color: white;
    }

    /* Pagination mewah */
    .pagination-luxury {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .pagination-luxury .pagination {
        gap: 0.3rem;
    }

    .pagination-luxury .page-link {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(219,39,119,0.25);
        border-radius: 40px !important;
        padding: 0.5rem 1rem;
        color: #db2777;
        font-weight: 500;
        transition: all 0.2s;
        margin: 0 0.1rem;
    }

    .pagination-luxury .page-link:hover {
        background: linear-gradient(105deg, #db2777, #2563eb);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
    }

    .pagination-luxury .active .page-link {
        background: linear-gradient(105deg, #db2777, #2563eb);
        border-color: transparent;
        color: white;
        box-shadow: 0 4px 10px rgba(219,39,119,0.3);
    }

    .pagination-luxury .disabled .page-link {
        background: rgba(255,255,255,0.4);
        color: #adb5bd;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(8px);
        border-radius: 2rem;
        border: 1px solid rgba(219,39,119,0.2);
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

<section class="container py-5">
    <!-- Header mewah -->
    <div class="articles-header">
        <h2>📚 Kumpulan Artikel</h2>
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
                    <div class="article-img bg-gradient" style="background: linear-gradient(135deg, #ffe4ec, #e0e7ff); display: flex; align-items: center; justify-content: center; color: #db2777;">
                        <span>📷 No Image</span>
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
                <span style="font-size: 3rem;">📭</span>
                <h4 class="mt-3 text-secondary">Belum ada artikel</h4>
                <p class="text-muted">Silakan tambah artikel baru melalui halaman admin.</p>
                <a href="/admin/artikel/create" class="btn-read mt-2">+ Tambah Artikel</a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination elegan -->
    @if(method_exists($artikels, 'links') && $artikels->hasPages())
    <div class="pagination-luxury mt-5">
        {{ $artikels->links('pagination::bootstrap-5') }}
    </div>
    @endif
</section>
@endsection