@extends('layouts.main')

@section('content')
<style>
    /* Gaya gelap elegan - Rosegold & Abu-abu */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap');

    .create-wrapper {
        background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
        min-height: 85vh;
        padding: 3rem 0;
        position: relative;
        overflow: hidden;
    }

    .create-wrapper::before {
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

    .create-wrapper::after {
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

    .create-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    .create-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .create-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        font-weight: 700;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: 0.5rem;
    }

    .create-header p {
        font-family: 'Poppins', sans-serif;
        color: #b0b0c0;
        font-size: 0.9rem;
    }

    .create-header .divider {
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #d4a0a8, #6c6c8c);
        margin: 0.8rem auto 0;
        border-radius: 2px;
    }

    /* Kartu Form */
    .create-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(12px);
        border-radius: 1.8rem;
        border: 1px solid rgba(192, 110, 123, 0.3);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .create-card:hover {
        border-color: rgba(212, 160, 168, 0.6);
        box-shadow: 0 20px 35px -12px rgba(192, 110, 123, 0.2);
    }

    .form-label {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #d4a0a8;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .form-control, .form-select {
        background: rgba(30, 30, 50, 0.8);
        border: 1px solid rgba(192, 110, 123, 0.35);
        border-radius: 1rem;
        padding: 0.7rem 1rem;
        transition: all 0.2s;
        color: #e0e0e8;
        font-family: 'Poppins', sans-serif;
    }

    .form-control:focus, .form-select:focus {
        border-color: #d4a0a8;
        box-shadow: 0 0 0 3px rgba(212, 160, 168, 0.25);
        background: rgba(30, 30, 50, 0.95);
        color: #ffffff;
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-save {
        background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
        background-size: 150% auto;
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        color: #12121c;
        transition: all 0.3s ease;
        box-shadow: 0 6px 14px rgba(192, 110, 123, 0.25);
    }

    .btn-save:hover {
        background-position: right center;
        transform: translateY(-2px);
        box-shadow: 0 12px 20px rgba(192, 110, 123, 0.4);
        color: #0a0a14;
    }

    .btn-secondary-custom {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(192, 110, 123, 0.4);
        padding: 0.7rem 2rem;
        border-radius: 40px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.9rem;
        color: #d4a0a8;
        transition: 0.2s;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-secondary-custom:hover {
        background: rgba(212, 160, 168, 0.15);
        border-color: #d4a0a8;
        color: #e0b0b8;
        transform: translateY(-2px);
    }

    .image-preview {
        margin-top: 0.8rem;
        display: none;
    }
    .image-preview img {
        max-width: 150px;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        border: 1px solid rgba(212,160,168,0.4);
    }

    .text-muted {
        color: #8a8aaa !important;
        font-size: 0.7rem;
    }

    .text-danger {
        color: #e08b8b !important;
        font-size: 0.75rem;
    }

    @media (max-width: 640px) {
        .create-header h1 {
            font-size: 2rem;
        }
        .create-card {
            margin: 0;
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

<div class="create-wrapper">
    <div class="create-container">
        <div class="create-header">
            <h1>Tambah Artikel</h1>
            <p>Tulis dan publikasikan artikel baru Anda</p>
            <div class="divider"></div>
        </div>

        <div class="create-card p-4 p-md-5">
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Judul Artikel</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" class="form-control" required>
                    @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Isi Artikel</label>
                    <textarea name="isi" rows="8" class="form-control" required>{{ old('isi') }}</textarea>
                    @error('isi') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control" required>
                    @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar Artikel (Opsional)</label>
                    <input type="file" name="gambar" class="form-control" id="gambarInput" accept="image/*">
                    <div class="image-preview" id="imagePreview">
                        <img src="#" alt="Preview Gambar">
                    </div>
                    <small class="text-muted">Maksimal 2MB (jpg, png, jpeg).</small>
                    @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="action-buttons d-flex gap-3 justify-content-center mt-4">
                    <button type="submit" class="btn-save">Simpan Artikel</button>
                    <a href="{{ route('admin.artikel.index') }}" class="btn-secondary-custom">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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