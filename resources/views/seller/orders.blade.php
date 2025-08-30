<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { padding: 0; margin: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 80px; }
        body { font-family: 'Roboto', Arial, sans-serif; background-color: #f4e7e1; }
        .navbar {
            background-color: rgba(82, 28, 13, 0.5);
            padding: 5px 10px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
        }
        .nav-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .nav-left a { text-decoration: none; color: white; }
        .nav-left h1 {
            font-size: 1.5rem;
            font-family: 'Lobster', cursive;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
        }
        .navbar-toggler {
            background: none;
            border: none;
            cursor: pointer;
            color: white;
            margin-left: 1rem;
            display: none;
        }
        .navbar-toggler svg {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            color: white;
        }
        .navbar-item {
            padding: 0;
            display: flex;
            font-family: 'roboto';
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
            text-shadow: 2px 3px black;
        }
        .navbar-item ul {
            list-style: none;
            display: flex;
            gap: 1rem;
            margin: 0;
            padding: 0;
        }
        .navbar-item a {
            padding: 0.5rem 0.75rem;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
            color: white;
            text-decoration: none;
        }
        .navbar-item a:hover, .navbar-item .active {
            background-color: #DE651A;
            color: white;
        }
        @media screen and (max-width: 768px) {
            .nav-container { flex-direction: column; align-items: flex-start; }
            .nav-left { width: 100%; justify-content: space-between; }
            .navbar-item { display: none; flex-direction: column; background-color: rgba(82, 28, 13, 0.2); padding: 1rem; width: 100%; }
            .navbar-item ul { flex-direction: column; }
            .navbar-item.show { display: flex; }
            .navbar-toggler { width: 24px; height: 24px; margin-left: auto; display: block; color: white; }
        }
        .konten {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 80px;
        }
        .orders-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: #E5720F;
            margin-bottom: 1rem;
            text-align: center;
        }
        .orders-welcome {
            color: #521c0d;
            text-align: center;
            margin-bottom: 1rem;
        }
        .success-box {
            color: #28a745;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 1rem;
        }
        .order-card {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .order-card h3 {
            color: #333;
            margin-top: 0;
        }
        .order-card p {
            color: #666;
            font-size: 14px;
            margin: 2px 0;
        }
        .order-card table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .order-card th, .order-card td {
            padding: 10px;
            text-align: left;
        }
        .order-card th {
            background-color: #f8f9fa;
            color: #521c0d;
        }
        .order-card tr {
            border-bottom: 1px solid #eee;
        }
        .order-card td {
            color: #333;
        }
        .order-total {
            color: #007bff;
            font-weight: bold;
            margin-top: 10px;
        }
        .order-status-form {
            margin-top: 10px;
        }
        .order-status-form select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .order-status-form button {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .order-status-form button:hover {
            background-color: #218838;
        }
        .wa-sent {
            color: #666;
            font-size: 14px;
            margin-top: 10px;
        }
        .empty-orders {
            color: #666;
            text-align: center;
        }
        footer {
            width: 100%;
            background-color: #E5720F;
            padding: 1rem 0;
            text-align: center;
            color: white;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <a href="#">
                    <h1>Pawon Adji</h1>
                </a>
                <button class="navbar-toggler" type="button" aria-expanded="false" id="navbar-toggler" onclick="document.getElementById('navbar-item').classList.toggle('show')">
                    <span class="hamburger-bar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h22M5 16h22M5 24h22"/>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="navbar-item" id="navbar-item">
                <ul>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('seller.orders') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seller.products') }}">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="konten">
        <div class="orders-title">{{ $title }}</div>
        <div class="orders-welcome">Selamat datang, {{ auth()->user()->name }}!</div>
        <form method="POST" action="{{ route('logout') }}" style="text-align:center; margin-bottom:1rem;">
            @csrf
            <button type="submit" class="order-status-form button" style="background-color:#E5720F; color:white; border-radius:5px; padding:0.7rem 1.5rem; border:none; cursor:pointer;">Logout</button>
        </form>
        @if (session('success'))
            <div class="success-box">{{ session('success') }}</div>
        @endif
        <h2 style="color: #333; text-align:center;">Daftar Pesanan</h2>
        @if ($orders->isEmpty())
            <p class="empty-orders">Belum ada pesanan.</p>
        @else
            @foreach ($orders as $order)
                <div class="order-card">
                    <h3>Pesanan #{{ $order->id }} ({{ $order->status }})</h3>
                    <p>Pembeli: {{ $order->buyer->name }} ({{ $order->buyer->phone }})</p>
                    <p>Tanggal: {{ $order->created_at->format('d-m-Y H:i') }}</p>
                    <p>Alamat Pengiriman: {{ $order->shipping_address }}</p>
                    <p>Metode Pembayaran: {{ $order->payment_method === 'bank_transfer' ? 'Transfer Bank' : 'Cash on Delivery' }}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Estimasi Preorder</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product->estimated_preorder_days ?? '1' }} hari</td>
                                    <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="order-total">Total Pesanan: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    <form action="{{ route('seller.orders.updateStatus', $order->id) }}" method="POST" class="order-status-form">
                        @csrf
                        <select name="status">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit">Ubah Status</button>
                    </form>
                    @if ($order->whatsapp_message_sent)
                        <p class="wa-sent">Pesan WhatsApp telah dikirim ke penjual.</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <footer>
        <p>© 2025 Pawon Adji. All rights reserved.</p>
    </footer>
    <script>
        const toggleBtn = document.getElementById('navbar-toggler');
        const menu = document.getElementById('navbar-item');
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('show');
        });
    </script>
</body>
</html>