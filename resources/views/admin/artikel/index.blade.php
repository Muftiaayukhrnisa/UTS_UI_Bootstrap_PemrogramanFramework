@extends('layouts.main')

@section('content')
<style>
    /* Gaya gelap elegan - Rosegold & Abu-abu (konsisten dengan halaman lain) */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap');

    .dashboard-wrapper {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        padding: 3rem 0;
        position: relative;
        overflow: hidden;
    }

    .dashboard-wrapper::before {
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

    .dashboard-wrapper::after {
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

    /* Alert custom */
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

    /* Kartu tabel */
    .dashboard-card {
        background: rgba(20, 20, 35, 0.5);
        backdrop-filter: blur(12px);
        border-radius: 1.8rem;
        border: 1px solid rgba(212, 160, 168, 0.25);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        border-color: rgba(212, 160, 168, 0.5);
        box-shadow: 0 20px 35px -12px rgba(192, 110, 123, 0.2);
    }

    /* Tabel */
    .table-custom {
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    .table-custom thead th {
        background: linear-gradient(105deg, #1a1a2e, #0f0f1a);
        color: #d4a0a8;
        font-weight: 600;
        border-bottom: 1px solid rgba(212, 160, 168, 0.3);
        padding: 1rem;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .table-custom tbody tr {
        transition: background 0.2s;
        border-bottom: 1px solid rgba(212, 160, 168, 0.1);
    }

    .table-custom tbody tr:hover {
        background: rgba(212, 160, 168, 0.05);
    }

    .table-custom td {
        padding: 1rem;
        vertical-align: middle;
        color: #c0c0d0;
        font-size: 0.9rem;
    }

    /* Badge status */
    .badge-status {
        background: rgba(212, 160, 168, 0.15);
        color: #d4a0a8;
        padding: 0.3rem 0.9rem;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.7rem;
        display: inline-block;
    }

    .badge-status.publish {
        background: linear-gradient(105deg, #b76e79, #d4a0a8);
        color: #12121c;
    }

    /* Tombol aksi */
    .btn-edit {
        background: rgba(30, 30, 50, 0.8);
        border: 1px solid rgba(212, 160, 168, 0.4);
        padding: 0.35rem 1rem;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #d4a0a8;
        transition: 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-edit:hover {
        background: rgba(212, 160, 168, 0.2);
        border-color: #d4a0a8;
        color: #e0b0b8;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: rgba(30, 30, 50, 0.8);
        border: 1px solid rgba(220, 53, 69, 0.4);
        padding: 0.35rem 1rem;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #e08b8b;
        transition: 0.2s;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: rgba(220, 53, 69, 0.15);
        border-color: #e08b8b;
        color: #f0a0a0;
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
        padding: 2rem;
    }

    .empty-state p {
        color: #b0b0c0;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            text-align: center;
        }
        .table-custom thead th {
            font-size: 0.7rem;
        }
        .table-custom td {
            font-size: 0.8rem;
        }
        .btn-edit, .btn-delete {
            padding: 0.3rem 0.7rem;
            font-size: 0.7rem;
        }
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <h2>Dashboard Artikel</h2>
            <a href="{{ route('admin.artikel.create') }}" class="btn-create">
                + Tambah Artikel
            </a>
        </div>

        <!-- Alert sukses -->
        @if(session('success'))
        <div class="alert-custom">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel artikel -->
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
                            <td class="fw-semibold">{{ $item->judul }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <span class="badge-status {{ $item->status == 'publish' ? 'publish' : '' }}">
                                    {{ $item->status == 'publish' ? 'Publish' : 'Draft' }}
                                </span>
                            </td>
                            <td>{{ number_format($item->views) }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn-edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel \"{{ $item->judul }}\"?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
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

        <!-- Pagination -->
        @if(method_exists($artikels, 'links') && $artikels->hasPages())
        <div class="pagination-luxury">
            {{ $artikels->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>
@endsection