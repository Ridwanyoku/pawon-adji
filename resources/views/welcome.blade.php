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
        @auth
            <p style="margin: 5px;">Selamat datang, {{ auth()->user()->name }}! ({{ auth()->user()->role }})</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="display: block; text-align: center; color: #007bff; text-decoration: none;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="color: white; text-decoration: none; margin-right: 10px;">Login</a>
            <a href="{{ route('register') }}" style="color: white; text-decoration: none;">Register</a>
        @endauth
    </header>
    <main style="max-width: 1200px; margin: 20px auto;">
        <h2 style="color: #333;">Daftar Produk</h2>
        <div style="margin-bottom: 20px;">
            <strong>Filter Kategori:</strong>
            <a href="{{ route('home') }}" style="margin: 0 10px; text-decoration: none; color: #007bff;">Semua</a>
            @foreach ($categories as $category)
                <a href="?category={{ $category->id }}" style="margin: 0 10px; text-decoration: none; color: #007bff;">{{ $category->name }}</a>
            @endforeach
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            @foreach ($products as $product)
                @if (!request('category') || $product->category_id == request('category'))
                    <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 5px;">
                        <h3 style="margin: 10px 0; color: #333;">{{ $product->name }}</h3>
                        <p style="color: #666; font-size: 14px;">Kategori: {{ $product->category->name }}</p>
                        <p style="color: #666; font-size: 14px;">Asal: {{ $product->origin_region }}</p>
                        <p style="color: #666; font-size: 14px;">{{ $product->description }}</p>
                        <p style="color: #007bff; font-weight: bold;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        @auth
                            @if (auth()->user()->role === 'buyer')
                                <form action="{{ route('cart.store') }}" method="POST" style="margin-top: 10px;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
                                    <button type="submit" style="background-color: #28a745; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Tambah ke Keranjang</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endif
            @endforeach
        </div>
    </main>
</body>
</html>