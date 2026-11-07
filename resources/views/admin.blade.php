
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin Smart Parking</h1>

    <h3>Selamat datang, Admin!</h3>

    <p>Anda berhasil masuk sebagai Admin.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
