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
        .nav-item.tas svg { vertical-align: middle; }
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
            margin-top: 80px; /* fix: space for fixed navbar */
        }
        .cart-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: #E5720F;
            margin-bottom: 1rem;
            text-align: center;
        }
        .cart-welcome {
            color: #521c0d;
            text-align: center;
            margin-bottom: 1rem;
        }
        .cart-actions {
            text-align: center;
            margin-bottom: 1rem;
        }
        .btn-back {
            background-color: #FF9B45;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 0.7rem 1.5rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s, color 0.3s;
            margin-bottom: 1rem;
            display: inline-block;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #DE651A;
            color: white;
        }
        .btn-logout {
            background-color: #E5720F;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.7rem 1.5rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s, color 0.3s;
            margin-left: 10px;
        }
        .btn-logout:hover {
            background-color: #DE651A;
            color: white;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .cart-table th, .cart-table td {
            padding: 10px;
            text-align: left;
        }
        .cart-table th {
            background-color: #f8f9fa;
            color: #521c0d;
        }
        .cart-table tr {
            border-bottom: 1px solid #eee;
        }
        .cart-table td {
            color: #333;
        }
        .btn-hapus {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-hapus:hover {
            background-color: #b71c1c;
        }
        .cart-empty {
            color: #666;
            text-align: center;
            margin: 2rem 0;
        }
        .cart-success {
            color: #28a745;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 1rem;
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
                <a href="/">
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
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Menu</a>
                    </li>
                    <li class="nav-item tas">
                        <a class="nav-link cart" href="{{ route('cart') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linejoin="round" d="M2.31 11.243A1 1 0 0 1 3.28 10h17.44a1 1 0 0 1 .97 1.242l-1.811 7.243A2 2 0 0 1 17.939 20H6.061a2 2 0 0 1-1.94-1.515z"/>
                                    <path stroke-linecap="round" d="M9 14v2m6-2v2m-9-6l4-6m8 6l-4-6"/>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/checkout">Checkout</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="nav-link active" href="{{ route('buyer.account') }}">Akun ({{ Auth::user()->name }})</a>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="konten">
        <div class="cart-title">{{ $title }}</div>
        <div class="cart-welcome">Selamat datang, {{ auth()->user()->name }}!</div>
        <div class="cart-actions">
            <a href="{{ route('home') }}" class="btn-back">Kembali ke Beranda</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
        @if (session('success'))
            <div class="cart-success">{{ session('success') }}</div>
        @endif
        <h2 style="color: #333; text-align:center;">Keranjang Belanja</h2>
        @if ($carts->isEmpty())
            <div class="cart-empty">Keranjang Anda kosong.</div>
        @else
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->product->name }}</td>
                            <td>Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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