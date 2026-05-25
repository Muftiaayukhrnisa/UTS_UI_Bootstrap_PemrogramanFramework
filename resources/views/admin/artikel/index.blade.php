@extends('layouts.main')

@section('content')
<style>
    /* Gaya gelap elegan untuk background luar */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap');

    .dashboard-wrapper {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        padding: 3rem 0;
        position: relative;
        overflow: hidden;
    }

    .dashboard-wrapper::before,
    .dashboard-wrapper::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        z-index: 0;
    }

    .dashboard-wrapper::before {
        top: -100px;
        right: -100px;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(192, 110, 123, 0.12), transparent 70%);
    }

    .dashboard-wrapper::after {
        bottom: -80px;
        left: -80px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(128, 128, 128, 0.08), transparent 70%);
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    /* Header */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
        background: rgba(20, 20, 35, 0.4);
        backdrop-filter: blur(8px);
        border-radius: 1.5rem;
        padding: 1.2rem 2rem;
        border: 1px solid rgba(212, 160, 168, 0.2);
    }

    .dashboard-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin: 0;
    }

    .btn-create {
        background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
        background-size: 150% auto;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.85rem;
        color: #12121c;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(192, 110, 123, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-create:hover {
        background-position: right center;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(192, 110, 123, 0.4);
        color: #0a0a14;
    }

    .alert-custom {
        background: rgba(30, 30, 50, 0.7);
        backdrop-filter: blur(8px);
        border-left: 4px solid #d4a0a8;
        border-radius: 1rem;
        padding: 1rem;
        margin-bottom: 1.5rem;
        color: #e0e0e8;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    /* Kartu tabel - background putih */
    .dashboard-card {
        background: #ffffff;
        border-radius: 1.8rem;
        border: 1px solid #e0e0e0;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    /* Tabel dengan garis pembatas antar kolom */
    .table-custom {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: white;
        width: 100%;
        border-collapse: collapse;
    }

    /* Header tabel */
    .table-custom thead th {
        background: #2c3e50;
        color: #ffffff;
        font-weight: 700;
        border-bottom: 2px solid #1a252f;
        padding: 1rem;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        text-align: center;
        vertical-align: middle;
        border-right: 1px solid #4a627a; /* garis pemisah header gelap */
    }
    .table-custom thead th:last-child {
        border-right: none;
    }

    /* Body tabel */
    .table-custom tbody td {
        padding: 1rem;
        vertical-align: middle;
        text-align: center;
        color: #212529;
        font-size: 0.9rem;
        border-right: 1px solid #a0a0a0; /* garis pemisah body warna gelap (abu-abu gelap) */
    }
    .table-custom tbody td:last-child {
        border-right: none;
    }

    /* Kolom pertama (Judul) rata kiri */
    .table-custom tbody td:first-child {
        text-align: left;
        font-weight: 600;
    }
    .table-custom thead th:first-child {
        text-align: left;
    }

    .table-custom tbody tr {
        background: #ffffff;
        border-bottom: 1px solid #d0d0d0; /* garis pemisah baris gelap */
    }

    .table-custom tbody tr:hover {
        background: #f8f9fa;
    }

    /* Badge status */
    .badge-status {
        background: #e9ecef;
        color: #2c3e50;
        padding: 0.3rem 0.9rem;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.7rem;
        display: inline-block;
        text-align: center;
    }
    .badge-status.publish {
        background: #d4a0a8;
        color: #12121c;
    }

    /* Tombol aksi */
    .btn-edit, .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        padding: 0.35rem 1rem;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 500;
        text-decoration: none;
        transition: 0.2s;
        cursor: pointer;
    }
    .btn-edit {
        background: #e9ecef;
        border: 1px solid #ced4da;
        color: #495057;
    }
    .btn-edit:hover {
        background: #d4a0a8;
        border-color: #d4a0a8;
        color: white;
        transform: translateY(-2px);
    }
    .btn-delete {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }
    .btn-delete:hover {
        background: #e08b8b;
        border-color: #dc3545;
        color: white;
        transform: translateY(-2px);
    }

    /* Pagination */
    .pagination-luxury {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    .pagination-luxury .pagination {
        gap: 0.3rem;
    }
    .pagination-luxury .page-link {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 40px !important;
        padding: 0.5rem 1rem;
        color: #d4a0a8;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        transition: all 0.2s;
    }
    .pagination-luxury .page-link:hover {
        background: #d4a0a8;
        border-color: #d4a0a8;
        color: white;
    }
    .pagination-luxury .active .page-link {
        background: #b76e79;
        border-color: #b76e79;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
    }
    .empty-state p {
        color: #6c757d;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            text-align: center;
        }
        .table-custom thead th,
        .table-custom tbody td {
            padding: 0.6rem;
            font-size: 0.7rem;
        }
        .btn-edit, .btn-delete {
            padding: 0.2rem 0.5rem;
            font-size: 0.65rem;
        }
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Dashboard Artikel</h2>
            <a href="{{ route('admin.artikel.create') }}" class="btn-create">+ Tambah Artikel</a>
        </div>

        @if(session('success'))
        <div class="alert-custom">{{ session('success') }}</div>
        @endif

        <div class="dashboard-card">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($artikels as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->kategori ?? 'Tidak ada kategori' }}</td>
                            <td><span class="badge-status {{ $item->status == 'publish' ? 'publish' : '' }}">{{ $item->status == 'publish' ? 'Publish' : 'Draft' }}</span></td>
                            <td>{{ number_format($item->views) }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel \"{{ $item->judul }}\"?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty-state">
                                <span style="font-size: 2rem; opacity: 0.5;">📭</span>
                                <p>Belum ada artikel. Yuk buat artikel pertama!</p>
                                <a href="{{ route('admin.artikel.create') }}" class="btn-create mt-2" style="display: inline-block;">+ Tambah Artikel</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($artikels, 'links') && $artikels->hasPages())
        <div class="pagination-luxury">
            {{ $artikels->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>
@endsection