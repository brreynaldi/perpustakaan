<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('images/back2.jpg') }}"); /* ganti nama file sesuai upload kamu */
          
            background-size: 80vw;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            margin-left: 60px;
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-login {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="login-box ">
        <h4 class="text-primary fw-bold mb-4 text-center">Selamat Datang di<br>Aplikasi Perpustakaan <br> SMK Bhakti Anindya</h4>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" required placeholder="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
        </form>
    </div>
</body>
</html>
