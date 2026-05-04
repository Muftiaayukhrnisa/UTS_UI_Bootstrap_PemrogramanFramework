@extends('layouts.main')

@section('content')
<style>
    /* Gaya spesifik untuk halaman edit artikel */
    .edit-header {
        background: linear-gradient(135deg, rgba(219,39,119,0.08), rgba(37,99,235,0.08));
        border-radius: 2rem;
        padding: 1.5rem 2rem;
        margin-bottom: 2rem;
    }

    .edit-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border-radius: 2rem;
        border: 1px solid rgba(219, 39, 119, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
        max-width: 900px;
        margin: 0 auto;
    }

    .edit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 35px -12px rgba(219, 39, 119, 0.2);
        border-color: rgba(37, 99, 235, 0.4);
    }

    .form-label {
        font-weight: 600;
        color: #db2777;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        letter-spacing: 0.3px;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(219, 39, 119, 0.25);
        border-radius: 1rem;
        padding: 0.7rem 1rem;
        transition: all 0.2s;
        color: #1e293b;
    }

    .form-control:focus, .form-select:focus {
        border-color: #db2777;
        box-shadow: 0 0 0 3px rgba(219, 39, 119, 0.2);
        background: white;
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-update {
        background: linear-gradient(105deg, #db2777, #2563eb);
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 40px;
        font-weight: 600;
        color: white;
        transition: 0.2s;
        box-shadow: 0 6px 14px rgba(37, 99, 235, 0.25);
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 20px rgba(219, 39, 119, 0.3);
        color: white;
    }

    .btn-secondary-custom {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(219,39,119,0.3);
        padding: 0.7rem 2rem;
        border-radius: 40px;
        font-weight: 500;
        color: #db2777;
        transition: 0.2s;
    }

    .btn-secondary-custom:hover {
        background: rgba(219,39,119,0.1);
        border-color: #db2777;
        color: #c24573;
        transform: translateY(-2px);
    }

    .current-image {
        background: rgba(255,255,240,0.5);
        border-radius: 1rem;
        padding: 0.8rem;
        display: inline-block;
    }

    @media (max-width: 640px) {
        .edit-card {
            margin: 0 1rem;
        }
        .btn-update, .btn-secondary-custom {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<section class="container py-5">
    <div class="edit-header text-center">
        <h1 class="display-5 fw-bold" style="background: linear-gradient(115deg, #db2777, #2563eb); background-clip: text; -webkit-background-clip: text; color: transparent;">
            Edit Artikel
        </h1>
        <p class="text-secondary">Perbarui informasi artikel Anda dengan mudah</p>
        <div style="width: 60px; height: 3px; background: linear-gradient(90deg, #db2777, #2563eb); margin: 0.5rem auto; border-radius: 2px;"></div>
    </div>

    <div class="edit-card p-4 p-md-5">
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label">📝 Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">📄 Isi Artikel</label>
                <textarea name="isi" rows="8" class="form-control" required>{{ old('isi', $artikel->isi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">🏷️ Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $artikel->kategori) }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">⚙️ Status</label>
                <select name="status" class="form-select">
                    <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>📄 Draft</option>
                    <option value="publish" {{ old('status', $artikel->status) == 'publish' ? 'selected' : '' }}>🚀 Publish</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">🖼️ Gambar Artikel (Opsional)</label>
                @if($artikel->gambar)
                    <div class="current-image mb-2">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Lama" width="100" class="rounded shadow-sm">
                        <p class="small text-secondary mt-1">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" name="gambar" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar. Maksimal 2MB (jpg, png, jpeg).</small>
            </div>

            <div class="action-buttons d-flex gap-3 justify-content-center mt-4">
                <button type="submit" class="btn-update">✨ Update Artikel</button>
                <a href="{{ route('admin.artikel.index') }}" class="btn-secondary-custom text-center">↩️ Kembali</a>
            </div>
        </form>
    </div>
</section>
@endsection