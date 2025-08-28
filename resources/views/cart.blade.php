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
        <a href="{{ route('home') }}" style="color: white; text-decoration: none; margin-right: 10px;">Kembali ke Beranda</a>
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="display: block; text-align: center; color: #007bff; text-decoration: none;">Logout</button>
            </form>
    </header>
    <main style="max-width: 800px; margin: 20px auto;">
        @if (session('success'))
            <p style="color: #28a745; background-color: #d4edda; padding: 10px; border-radius: 5px; text-align: center;">{{ session('success') }}</p>
        @endif
        <h2 style="color: #333;">Keranjang Belanja</h2>
        @if ($carts->isEmpty())
            <p style="color: #666; text-align: center;">Keranjang Anda kosong.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 10px; text-align: left;">Produk</th>
                        <th style="padding: 10px; text-align: left;">Harga</th>
                        <th style="padding: 10px; text-align: left;">Jumlah</th>
                        <th style="padding: 10px; text-align: left;">Total</th>
                        <th style="padding: 10px; text-align: left;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td style="padding: 10px;">{{ $cart->product->name }}</td>
                            <td style="padding: 10px;">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                            <td style="padding: 10px;">{{ $cart->quantity }}</td>
                            <td style="padding: 10px;">Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                            <td style="padding: 10px;">
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>
</body>
</html>