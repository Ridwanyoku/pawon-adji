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
        <a href="{{ route('cart') }}" style="color: white; text-decoration: none; margin-right: 10px;">Kembali ke Keranjang</a>
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="display: block; text-align: center; color: #007bff; text-decoration: none;">Logout</button>
        </form>
    </header>
    <main style="max-width: 800px; margin: 20px auto;">
        @if (session('error'))
            <p style="color: #dc3545; background-color: #f8d7da; padding: 10px; border-radius: 5px; text-align: center;">{{ session('error') }}</p>
        @endif
        @if (session('success'))
            <p style="color: #28a745; background-color: #d4edda; padding: 10px; border-radius: 5px; text-align: center;">{{ session('success') }}</p>
        @endif
        <h2 style="color: #333;">Checkout Pesanan</h2>
        @if ($carts->isEmpty())
            <p style="color: #666; text-align: center;">Keranjang Anda kosong.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 10px; text-align: left;">Produk</th>
                        <th style="padding: 10px; text-align: left;">Harga</th>
                        <th style="padding: 10px; text-align: left;">Jumlah</th>
                        <th style="padding: 10px; text-align: left;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td style="padding: 10px;">{{ $cart->product->name }}</td>
                            <td style="padding: 10px;">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                            <td style="padding: 10px;">{{ $cart->quantity }}</td>
                            <td style="padding: 10px;">Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="padding: 10px; text-align: right; font-weight: bold;">Total:</td>
                        <td style="padding: 10px;">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3 style="color: #333; margin-top: 0;">Detail Pengiriman</h3>
                    <div style="margin-bottom: 15px;">
                        <label for="shipping_address" style="display: block; margin-bottom: 5px;">Alamat Pengiriman</label>
                        <textarea name="shipping_address" id="shipping_address" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                        @error('shipping_address')
                            <p style="color: #dc3545; font-size: 14px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label for="payment_method" style="display: block; margin-bottom: 5px;">Metode Pembayaran</label>
                        <select name="payment_method" id="payment_method" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            <option value="bank_transfer">Transfer Bank</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                        @error('payment_method')
                            <p style="color: #dc3545; font-size: 14px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Buat Pesanan</button>
                </div>
            </form>
        @endif
        @isset($order)
            <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 20px;">
                <h3 style="color: #333; margin-top: 0;">Pesanan Berhasil Dibuat</h3>
                <p style="color: #666; font-size: 14px;">Pesanan #{{ $order->id }} telah dibuat. Silakan kirim detail ke penjual.</p>
                <a href="{{ route('checkout.sendWhatsApp', $order->id) }}" style="display: inline-block; background-color: #25D366; color: white; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none; margin-top: 10px;">Kirim</a>
            </div>
        @endisset
    </main>
</body>
</html>