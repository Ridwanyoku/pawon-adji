<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 20px;">
    <h1 style="color: #333; text-align: center;">{{ $title }}</h1>
    <p style="text-align: center;">Selamat datang, {{ auth()->user()->name }}! Ini dashboard admin.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="display: block; text-align: center; color: #007bff; text-decoration: none;">Logout</button>
    </form>
</body>
</html>