{{-- login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet"> <!-- Pastikan ini sesuai dengan lokasi file CSS Anda -->
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    
    @if(session('login_failed'))
<script>
    alert('{{ session('login_failed') }}');
    window.location.href = '{{ route('login') }}'; // Mengarahkan kembali ke halaman login
</script>
@endif

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn-login">Login</button>
    </form>

    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
</div>

</body>
</html>
