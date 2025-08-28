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
        <a href="{{ route('cart') }}" style="color: white; text-decoration: none; margin-right: 10px;">Keranjang</a>
        <a href="{{ route('logout') }}" style="color: white; text-decoration: none;">Logout</a>
    </header>
    <main style="max-width: 800px; margin: 20px auto;">
        @if (session('success'))
            <p style="color: #28a745; background-color: #d4edda; padding: 10px; border-radius: 5px; text-align: center;">{{ session('success') }}</p>
        @endif
        <h2 style="color: #333;">Riwayat Pesanan</h2>
        @if ($orders->isEmpty())
            <p style="color: #666; text-align: center;">Belum ada pesanan.</p>
        @else
            @foreach ($orders as $order)
                <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
                    <h3 style="color: #333; margin-top: 0;">Pesanan #{{ $order->id }} ({{ $order->status }})</h3>
                    <p style="color: #666; font-size: 14px;">Tanggal: {{ $order->created_at->format('d-m-Y H:i') }}</p>
                    <p style="color: #666; font-size: 14px;">Alamat Pengiriman: {{ $order->shipping_address }}</p>
                    <p style="color: #666; font-size: 14px;">Metode Pembayaran: {{ $order->payment_method === 'bank_transfer' ? 'Transfer Bank' : 'Cash on Delivery' }}</p>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                        <thead>
                            <tr style="background-color: #f8f9fa;">
                                <th style="padding: 10px; text-align: left;">Produk</th>
                                <th style="padding: 10px; text-align: left;">Harga</th>
                                <th style="padding: 10px; text-align: left;">Jumlah</th>
                                <th style="padding: 10px; text-align: left;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td style="padding: 10px;">{{ $item->product->name }}</td>
                                    <td style="padding: 10px;">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td style="padding: 10px;">{{ $item->quantity }}</td>
                                    <td style="padding: 10px;">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p style="color: #007bff; font-weight: bold; margin-top: 10px;">Total Pesanan: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        @endif
    </main>
</body>
</html>