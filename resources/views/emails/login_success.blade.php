<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Berhasil</title>
</head>
<body>
    <h2>Halo, {{ $user->name }}</h2>
    <p>Anda berhasil login pada {{ now()->format('d-m-Y H:i:s') }}.</p>
    <p>Jika ini bukan Anda, segera hubungi administrator.</p>
</body>
</html>
