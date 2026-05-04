@extends('layouts.main')

@section('content')
<style>
    /* Gaya spesifik untuk halaman tambah artikel */
    .create-header {
        background: linear-gradient(135deg, rgba(219,39,119,0.08), rgba(37,99,235,0.08));
        border-radius: 2rem;
        padding: 1.5rem 2rem;
        margin-bottom: 2rem;
    }

    .create-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border-radius: 2rem;
        border: 1px solid rgba(219, 39, 119, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
        max-width: 900px;
        margin: 0 auto;
    }

    .create-card:hover {
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

    .btn-save {
        background: linear-gradient(105deg, #db2777, #2563eb);
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 40px;
        font-weight: 600;
        color: white;
        transition: 0.2s;
        box-shadow: 0 6px 14px rgba(37, 99, 235, 0.25);
    }

    .btn-save:hover {
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
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-secondary-custom:hover {
        background: rgba(219,39,119,0.1);
        border-color: #db2777;
        color: #c24573;
        transform: translateY(-2px);
    }

    .image-preview {
        margin-top: 0.5rem;
        display: none;
    }
    .image-preview img {
        max-width: 150px;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    @media (max-width: 640px) {
        .create-card {
            margin: 0 1rem;
        }
        .btn-save, .btn-secondary-custom {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<section class="container py-5">
    <div class="create-header text-center">
        <h1 class="display-5 fw-bold" style="background: linear-gradient(115deg, #db2777, #2563eb); background-clip: text; -webkit-background-clip: text; color: transparent;">
            Tambah Artikel
        </h1>
        <p class="text-secondary">Tulis dan publikasikan artikel baru Anda</p>
        <div style="width: 60px; height: 3px; background: linear-gradient(90deg, #db2777, #2563eb); margin: 0.5rem auto; border-radius: 2px;"></div>
    </div>

    <div class="create-card p-4 p-md-5">
        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="form-label">📝 Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="form-control" required>
                @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">📄 Isi Artikel</label>
                <textarea name="isi" rows="8" class="form-control" required>{{ old('isi') }}</textarea>
                @error('isi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">🏷️ Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control" required>
                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">⚙️ Status</label>
                <select name="status" class="form-select">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>📄 Draft</option>
                    <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>🚀 Publish</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">🖼️ Gambar Artikel (Opsional)</label>
                <input type="file" name="gambar" class="form-control" id="gambarInput" accept="image/*">
                <div class="image-preview" id="imagePreview">
                    <img src="#" alt="Preview Gambar">
                </div>
                <small class="text-muted">Maksimal 2MB (jpg, png, jpeg).</small>
                @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="action-buttons d-flex gap-3 justify-content-center mt-4">
                <button type="submit" class="btn-save">✨ Simpan Artikel</button>
                <a href="{{ route('admin.artikel.index') }}" class="btn-secondary-custom">↩️ Kembali</a>
            </div>
        </form>
    </div>
</section>

<script>
    // Preview gambar sebelum upload
    const gambarInput = document.getElementById('gambarInput');
    const previewContainer = document.getElementById('imagePreview');
    const previewImage = previewContainer.querySelector('img');

    gambarInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.src = '#';
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection