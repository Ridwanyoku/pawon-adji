<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0;">
    <nav style="background-color: #007bff; color: white; padding: 20px; text-align: center;">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 style="margin: 0;">Pawon Adji</h1>
                <button style="background: none; border: none; color: white; font-size: 24px; cursor: pointer;" onclick="document.getElementById('navbar-item').classList.toggle('show')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h22M5 16h22M5 24h22"/></svg>
                </button>
            </div>
            <div id="navbar-item" style="display: none; flex-direction: column; background-color: #0056b3; padding: 10px; position: absolute; right: 20px; top: 70px; z-index: 1;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Beranda</a></li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('cart') }}" style="color: white; text-decoration: none;">Keranjang</a></li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('orders.index') }}" style="color: white; text-decoration: none;">Pesanan</a></li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('reviews') }}" style="color: white; text-decoration: none;">Ulasan</a></li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('buyer.dashboard') }}" style="color: white; text-decoration: none;">Dasbor</a></li>
                    <li><a href="{{ route('logout') }}" style="color: white; text-decoration: none;">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="max-width: 800px; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">Akun Pembeli</h2>
        <p style="color: #666;">Selamat datang, {{ auth()->user()->name }}!</p>

        <section style="margin-top: 20px;">
            <h3 style="color: #333;">Pesanan Anda</h3>
            @if ($orders->isEmpty())
                <p style="color: #666;">Belum ada pesanan.</p>
            @else
                @foreach ($orders as $order)
                    <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <p style="color: #666;">Pesanan #{{ $order->id }} - Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <p style="color: #666;">Status: {{ $order->status }}</p>
                        <p style="color: #666;">Alamat: {{ $order->shipping_address }}</p>
                        @foreach ($order->orderItems as $item)
                            <p style="color: #666;">- {{ $item->product->name }} (x{{ $item->quantity }})</p>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </section>

        <section style="margin-top: 20px;">
            <h3 style="color: #333;">Ulasan Anda</h3>
            @if ($reviews->isEmpty())
                <p style="color: #666;">Belum ada ulasan. <a href="{{ route('reviews') }}" style="color: #007bff; text-decoration: none;">Tambah Ulasan</a></p>
            @else
                @foreach ($reviews as $review)
                    <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <p style="color: #666;">{{ $review->comment }}</p>
                        <p style="color: #333;">Rating: {{ $review->rating }} / 5</p>
                    </div>
                @endforeach
            @endif
        </section>
    </div>

    <footer style="text-align: center; padding: 20px; background-color: #333; color: white; margin-top: 20px;">
        <p style="margin: 0;">© 2025 Pawon Adji. All rights reserved.</p>
    </footer>

    <script>
        const toggleBtn = document.querySelector('button[onclick]');
        const menu = document.getElementById('navbar-item');
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('show');
        });
    </script>
</body>
</html>