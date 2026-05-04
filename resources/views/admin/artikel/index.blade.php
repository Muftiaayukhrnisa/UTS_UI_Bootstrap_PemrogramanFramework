@extends('layouts.main')

@section('content')
<style>
    /* Gaya spesifik untuk dashboard admin */
    .dashboard-header {
        background: linear-gradient(135deg, rgba(219,39,119,0.08), rgba(37,99,235,0.08));
        border-radius: 2rem;
        padding: 1.5rem 2rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .dashboard-header h2 {
        font-size: 1.8rem;
        font-weight: 800;
        background: linear-gradient(115deg, #db2777, #2563eb);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin: 0;
    }

    .btn-create {
        background: linear-gradient(105deg, #db2777, #2563eb);
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 40px;
        font-weight: 600;
        color: white;
        transition: 0.2s;
        box-shadow: 0 4px 10px rgba(37,99,235,0.25);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(219,39,119,0.3);
        color: white;
    }

    .dashboard-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border-radius: 1.5rem;
        border: 1px solid rgba(219, 39, 119, 0.2);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        box-shadow: 0 20px 35px -12px rgba(219, 39, 119, 0.2);
        border-color: rgba(37, 99, 235, 0.4);
    }

    .table-custom {
        margin: 0;
    }

    .table-custom thead th {
        background: linear-gradient(105deg, #1e1e2f, #16213e);
        color: white;
        font-weight: 600;
        border-bottom: none;
        padding: 1rem;
        font-size: 0.9rem;
    }

    .table-custom tbody tr {
        transition: background 0.2s;
        border-bottom: 1px solid rgba(219,39,119,0.1);
    }

    .table-custom tbody tr:hover {
        background: rgba(219,39,119,0.05);
    }

    .table-custom td {
        padding: 1rem;
        vertical-align: middle;
        color: #1e293b;
    }

    .badge-status {
        background: rgba(219,39,119,0.15);
        color: #db2777;
        padding: 0.4rem 1rem;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.75rem;
    }

    .badge-status.publish {
        background: linear-gradient(105deg, #db2777, #2563eb);
        color: white;
    }

    .btn-edit {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(219,39,119,0.3);
        padding: 0.4rem 1rem;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 500;
        color: #db2777;
        transition: 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-edit:hover {
        background: rgba(219,39,119,0.1);
        border-color: #db2777;
        color: #c24573;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(220,53,69,0.3);
        padding: 0.4rem 1rem;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 500;
        color: #dc3545;
        transition: 0.2s;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: rgba(220,53,69,0.1);
        border-color: #dc3545;
        color: #b02a37;
        transform: translateY(-2px);
    }

    /* Alert custom */
    .alert-custom {
        background: rgba(255,255,255,0.8);
        backdrop-filter: blur(8px);
        border-left: 4px solid #db2777;
        border-radius: 1rem;
        padding: 1rem;
        margin-bottom: 1.5rem;
        color: #1e293b;
        font-weight: 500;
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
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(219,39,119,0.25);
        border-radius: 40px !important;
        padding: 0.5rem 1rem;
        color: #db2777;
        font-weight: 500;
        transition: all 0.2s;
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

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            text-align: center;
        }
        .table-custom thead {
            font-size: 0.75rem;
        }
        .btn-edit, .btn-delete {
            padding: 0.3rem 0.7rem;
            font-size: 0.7rem;
        }
    }
</style>

<section class="container py-5">
    <!-- Header dengan tombol tambah -->
    <div class="dashboard-header">
        <h2>📋 Dashboard Artikel</h2>
        <a href="{{ route('admin.artikel.create') }}" class="btn-create">
            ✨ + Tambah Artikel
        </a>
    </div>

    <!-- Alert sukses -->
    @if(session('success'))
    <div class="alert-custom">
        <div class="d-flex align-items-center gap-2">
            <span style="font-size: 1.2rem;">✅</span>
            <span>{{ session('success') }}</span>
        </div>
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
                                {{ $item->status == 'publish' ? '🚀 Publish' : '📄 Draft' }}
                            </span>
                        </td>
                        <td>
                            <span class="d-inline-flex align-items-center gap-1">
                                👁️ {{ number_format($item->views) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn-edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel \"{{ $item->judul }}\"?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <span style="font-size: 2rem;">📭</span>
                            <p class="mt-2 text-secondary">Belum ada artikel. Yuk buat artikel pertama!</p>
                            <a href="{{ route('admin.artikel.create') }}" class="btn-create mt-2">+ Tambah Artikel</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination mewah -->
    @if(method_exists($artikels, 'links') && $artikels->hasPages())
    <div class="pagination-luxury">
        {{ $artikels->links('pagination::bootstrap-5') }}
    </div>
    @endif
</section>
@endsection