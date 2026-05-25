@extends('layouts.main')

@section('content')
<style>
    .profile-container {
        max-width: 700px;
        margin: 2rem auto;
        background: rgba(20,20,35,0.7);
        backdrop-filter: blur(12px);
        border-radius: 32px;
        border: 1px solid rgba(212,160,168,0.3);
        padding: 2rem;
        box-shadow: 0 25px 45px rgba(0,0,0,0.4);
    }
    .profile-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }
    .avatar-large {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #b76e79, #d4a0a8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.8rem;
        font-weight: bold;
        color: #12121c;
        font-family: 'Playfair Display', serif;
    }
    .profile-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        background: linear-gradient(135deg, #e0a0b0, #d4a0a8);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        font-weight: 500;
        font-size: 0.8rem;
        color: #d4a0a8;
        display: block;
        margin-bottom: 0.5rem;
    }
    .form-control {
        background: rgba(15,15,25,0.8);
        border: 1px solid rgba(212,160,168,0.3);
        border-radius: 16px;
        padding: 0.8rem 1.2rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        color: #f0f0f0;
        width: 100%;
    }
    .form-control:focus {
        outline: none;
        border-color: #d4a0a8;
        box-shadow: 0 0 0 3px rgba(212,160,168,0.2);
    }
    .btn-save {
        background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
        background-size: 150% auto;
        border: none;
        padding: 0.8rem;
        border-radius: 40px;
        font-weight: 600;
        color: #12121c;
        width: 100%;
        cursor: pointer;
        transition: 0.3s;
    }
    .btn-save:hover {
        background-position: right center;
        transform: translateY(-2px);
    }
    .btn-back {
        display: inline-block;
        margin-top: 1rem;
        text-align: center;
        color: #d4a0a8;
        text-decoration: none;
        transition: 0.2s;
    }
    .btn-back:hover {
        color: #e0b0b8;
    }
    .alert-success {
        background: rgba(40,167,69,0.2);
        border-left: 4px solid #28a745;
        padding: 0.8rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        color: #d4edda;
    }
    .alert-danger {
        background: rgba(220,53,69,0.15);
        border-left: 4px solid #dc3545;
        padding: 0.8rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        color: #f8d7da;
        font-size: 0.85rem;
    }
    .logout-btn {
        background: none;
        border: none;
        color: #d4a0a8;
        cursor: pointer;
        font-family: inherit;
        font-size: inherit;
        transition: 0.2s;
    }
    .logout-btn:hover {
        color: #e0b0b8;
    }
    @media (max-width: 600px) {
        .profile-container {
            margin: 1rem;
            padding: 1.5rem;
        }
        .profile-header {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<div class="profile-container" data-aos="fade-up" data-aos-duration="800">
    <div class="profile-header" data-aos="fade-down" data-aos-delay="100">
        <div class="avatar-large">
            {{ substr($user->name, 0, 1) }}
        </div>
        <div>
            <h1 class="profile-title">Profil Saya</h1>
            <p style="color: #b0b0c0;">{{ $user->email }}</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success" data-aos="fade-up" data-aos-delay="150">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-danger" data-aos="fade-up" data-aos-delay="150">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" data-aos="fade-up" data-aos-delay="200">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Password Baru (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn-save">Simpan Perubahan</button>
    </form>

    <div style="text-align: center; margin-top: 1.5rem;" data-aos="fade-up" data-aos-delay="250">
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        &nbsp;|&nbsp;
        <a href="{{ route('home') }}" class="btn-back">Kembali ke Beranda</a>
    </div>
</div>
@endsection