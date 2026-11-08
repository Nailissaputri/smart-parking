
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking</title>
</head>
<body>

    <h1>Smart Parking</h1>
    <h2>Parking Availability</h2>

    <p>A1 - Tersedia</p>
    <p>A2 - Terisi</p>
    <p>A3 - Tersedia</p>
    <p>A4 - Terisi</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
