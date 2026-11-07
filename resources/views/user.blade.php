
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
</head>
<body>
    <h1>Dashboard User Smart Parking</h1>

    <h3>Selamat datang, User!</h3>

    <p>Silakan lihat informasi ketersediaan parkir.</p>

    <a href="{{ url('/parking') }}">Lihat Ketersediaan Parkir</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
