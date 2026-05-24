<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | MutiBlog</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(145deg, #0f0f1a 0%, #1a1a2e 50%, #0d0d18 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-card {
            background: rgba(20, 20, 35, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 32px;
            border: 1px solid rgba(212, 160, 168, 0.3);
            padding: 2.5rem;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 25px 45px rgba(0,0,0,0.4);
        }

        .auth-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #e0a0b0, #d4a0a8, #b0b0c0);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            color: #b0b0c0;
            font-size: 0.9rem;
            margin-bottom: 2rem;
            border-left: 3px solid #d4a0a8;
            padding-left: 12px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            color: #d4a0a8;
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: rgba(15, 15, 25, 0.8);
            border: 1px solid rgba(212, 160, 168, 0.3);
            border-radius: 16px;
            padding: 0.8rem 1.2rem;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            color: #f0f0f0;
            width: 100%;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #d4a0a8;
            box-shadow: 0 0 0 3px rgba(212, 160, 168, 0.2);
            background: rgba(20, 20, 35, 0.9);
        }

        .btn-auth {
            width: 100%;
            background: linear-gradient(105deg, #b76e79, #d4a0a8, #8c8cac);
            background-size: 150% auto;
            border: none;
            padding: 0.9rem;
            border-radius: 40px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            color: #12121c;
            transition: all 0.3s;
            cursor: pointer;
            margin-top: 0.5rem;
        }

        .btn-auth:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(192,110,123,0.4);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.8rem;
            font-size: 0.85rem;
            color: #a0a0b0;
        }

        .auth-footer a {
            color: #d4a0a8;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.15);
            border-left: 4px solid #dc3545;
            padding: 0.8rem;
            border-radius: 12px;
            color: #f8d7da;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        @media (max-width: 480px) {
            .auth-card { padding: 1.8rem; }
            .auth-title { font-size: 1.8rem; }
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <h2 class="auth-title">Daftar Akun</h2>
        <div class="auth-subtitle">Bergabunglah dengan MutiBlog</div>

        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn-auth">Daftar</button>
        </form>

        <div class="auth-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>
        </div>
    </div>
</body>
</html>