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
        .account-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: #E5720F;
            margin-bottom: 1rem;
            text-align: center;
        }
        .account-welcome {
            color: #521c0d;
            text-align: center;
            margin-bottom: 1rem;
        }
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
        }
        .profile-photo img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #E5720F;
            margin-bottom: 1rem;
        }
        .profile-data {
            background: #f4e7e1;
            padding: 1rem 2rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            width: 100%;
            max-width: 400px;
        }
        .profile-data p { margin: 0.5rem 0; color: #521c0d; }
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            background-color: #E5720F;
            border-radius: 15px;
            padding: 10px;
            margin-bottom: 1rem;
            text-align: center;
        }
        .order-card, .review-card {
            background: #fff;
            border: 2px solid #fff8ff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.07);
            margin-bottom: 1.5rem;
            padding: 1rem;
        }
        .order-header { display: flex; justify-content: space-between; margin-bottom: 0.5rem; }
        .order-status { color: #DE651A; font-weight: bold; }
        .order-items { margin-bottom: 0.5rem; }
        .order-item { color: #666; }
        .order-total { text-align: right; margin-top: 0.5rem; color: #521c0d; font-weight: bold; }
        .review-comment { color: #666; }
        .review-rating { color: #E5720F; font-weight: bold; }
        .btn-checkout {
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
        .btn-checkout:hover {
            background-color: #DE651A;
            color: white;
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
        <div class="account-title">Akun Pembeli</div>
        <div class="account-welcome">Selamat datang, {{ auth()->user()->name }}!</div>
        <div class="profile-section">
            <div class="profile-photo">
                <img src="{{ Auth::user()->profile_photo_url ?? asset('/pawon adji/♱.jpeg') }}" alt="Foto Profil">
            </div>
            <div class="profile-data">
                <p><strong>Nama Lengkap:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>No Telp:</strong> {{ Auth::user()->phone ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ Auth::user()->address ?? '-' }}</p>
            </div>
        </div>
        <a href="/checkout" class="btn-checkout">Checkout</a>
        <section>
            <div class="section-title">Pesanan Anda</div>
            @if ($orders->isEmpty())
                <p style="color: #666; text-align:center;">Belum ada pesanan.</p>
            @else
                @foreach ($orders as $order)
                    <div class="order-card">
                        <div class="order-header">
                            <span>Pesanan #{{ $order->id }}</span>
                            <span class="order-status">{{ ucfirst($order->status) }}</span>
                        </div>
                        <div class="order-items">
                            @foreach ($order->orderItems as $item)
                                <div class="order-item">
                                    {{ $item->product->name }} (x{{ $item->quantity }})
                                </div>
                            @endforeach
                        </div>
                        <div class="order-total">
                            Total: <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                        </div>
                        <div style="color:#666;">Alamat: {{ $order->shipping_address }}</div>
                    </div>
                @endforeach
            @endif
        </section>
        <section>
            <div class="section-title">Ulasan Anda</div>
            @if ($reviews->isEmpty())
                <p style="color: #666; text-align:center;">Belum ada ulasan. <a href="{{ route('reviews') }}" style="color: #007bff; text-decoration: none;">Tambah Ulasan</a></p>
            @else
                @foreach ($reviews as $review)
                    <div class="review-card">
                        <div class="review-comment">{{ $review->comment }}</div>
                        <div class="review-rating">Rating: {{ $review->rating }} / 5</div>
                    </div>
                @endforeach
            @endif
        </section>
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