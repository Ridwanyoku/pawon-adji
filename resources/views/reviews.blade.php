<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 20px;">
    <header style="text-align: center; padding: 20px; background-color: #007bff; color: white;">
        <h1 style="margin: 0;">{{ $title }}</h1>
        <p style="margin: 5px;">Selamat datang, {{ auth()->user()->name }}!</p>
        <a href="{{ route('home') }}" style="color: white; text-decoration: none;">Kembali ke Beranda</a>
        <a href="{{ route('logout') }}" style="color: white; text-decoration: none; margin-left: 10px;">Logout</a>
    </header>
    <main style="max-width: 800px; margin: 20px auto;">
        @if (session('success'))
            <p style="color: #28a745; background-color: #d4edda; padding: 10px; border-radius: 5px; text-align: center;">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p style="color: #dc3545; background-color: #f8d7da; padding: 10px; border-radius: 5px; text-align: center;">{{ session('error') }}</p>
        @endif

        <h2 style="color: #333;">Tambah Ulasan Anda</h2>
        <form action="{{ route('reviews.store') }}" method="POST" style="margin-bottom: 20px;">
            @csrf
            <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <label for="rating" style="display: block; margin-bottom: 5px;">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <label for="comment" style="display: block; margin-bottom: 5px; margin-top: 10px;">Komentar</label>
                <textarea name="comment" id="comment" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">Kirim Ulasan</button>
            </div>
        </form>

        <h2 style="color: #333;">Ulasan Pelanggan</h2>
        <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            @foreach ($reviews as $review)
                <div style="margin-bottom: 15px;">
                    <p style="color: #666; margin: 0 0 5px 0;">{{ $review->comment }}</p>
                    <h4 style="color: #333; margin: 0;">{{ $review->user->name }} - Rating: {{ $review->rating }} / 5</h4>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>