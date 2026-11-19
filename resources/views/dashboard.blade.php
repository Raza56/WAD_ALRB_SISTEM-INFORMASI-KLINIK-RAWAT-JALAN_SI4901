<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Selamat Datang di Ruang Poliklinik</h1>

    <p>Login berhasil!</p>

    <a href="/poliklinik">Lihat Data Poliklinik</a>

    <br><br>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>