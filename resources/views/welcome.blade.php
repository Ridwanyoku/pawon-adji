<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    scroll-padding-top: 80px;
}

.nav-container {
    width: 100%;
    max-width: 1200px;
    margin:  auto;
    display: flex;
    align-items: flex-start;
    text-align: center;
    justify-content: space-between;
}

.navbar {
    background-color: rgba(82, 28, 13, 0.5);
    padding: 5px 10px;
    width: 100%;
    position: fixed;
    z-index: 99;
}

.nav-left {
    width: 100%;
    display: flex;
    margin: 0.5rem 0.5rem 0rem 0.5rem;
    justify-content: space-between;
}

.navbar a {
    text-decoration: none;
    color: white;
}

.navbar h1 {
    font-size: 1.5rem;
    font-weight: bold;
    font-family: "Lobster";
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
}

.navbar-item {
    padding: 1rem 0;
    display: flex;
    font-family: 'roboto';
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    text-shadow: 2px 3px black;
}

.navbar-item svg {
    filter: drop-shadow(2px 3px black);
}

.navbar-item ul {
    list-style: none;
    display: flex;
    gap: 1rem;
}

.navbar-item a {
    padding: 0.5rem 0.75rem;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

.navbar-item a:hover {
    color: white;
    background-color: #DE651A;
}

.navbar-toggler {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    color: white;
    margin-left: auto;
}

.navbar-toggler svg {
    width: 24px;
    height: 24px;
    vertical-align: middle;
    bottom: 5px;
    color: white;
}

.navbar-toggler:hover {
    background-color: #DE651A;
    border-radius: 5px;
}

.nav-link svg{
    color: white;
    width: 1.5rem;
    height: 1.5rem;
    vertical-align: middle;
    transition: color 0.3s;
}

@media screen and (min-width: 769px) {
    .navbar-item {
        display: flex;
        flex-direction: row;
    }

    .navbar-item ul {
        display: flex;
        flex-direction: row;
    }

    .navbar-toggler {
        display: none;
    }

    .navbar .nav-item:not(:last-child) {
        margin-right: 1rem;
        padding-right: 1rem;
        border-right: 1px solid #ccc;
    }
    
}

@media screen and (max-width: 768px) {
    .nav-container {
        display: flex;
        flex-direction: column;
    }

    .nav-left {
    margin: 0rem 0.5rem 0rem 0.5rem;
    }

    .nav-left h1 {
        padding: 1rem 0;
    }

    .navbar-item {
        display: none;
        flex-direction: column;
        background-color: rgba(82, 28, 13, 0.2);
        padding: 1rem;
        width: 100%;
        transition: max-height 0.3s ease-in-out;
    }

    .navbar-item ul{
        flex-direction: column;
    }

    .navbar-item.show {
        display: flex;
    }

    .navbar-toggler {
        width: 24px;
        height: 24px;
        margin: auto 1rem;
        display: block;
        color: white;
    }
}

.navbar-toggler.active .navbar-item {
    display: flex;
}

.konten {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    font-family: 'roboto';
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding-top: 1rem;
}

.title {
    font-family: 'roboto';
    font-weight: bold;
    padding: 5px;
    font-size: 1rem;
    color: white;
    background-color: #E5720F;
    border-radius: 15px;
}

.hero-img {
    background-color: #521c0d;
    background-image: url('/pawon adji/rumah_nenek.png');
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center; 
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: left;
    padding-top: 75px; 
    padding-left: 20px;
    font-family: 'Montserrat';
}

.container-hero-img {
    max-width: 800px;
    padding: 0 1rem;
    color: white;
    text-align: left;
}

.hero-img h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.hero-img p {
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
}

.hero-img a svg {
    width: 24px;
    height: 24px;
}

.hero-img .btn {
    background-color: #FF9B45;
    color: black;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    text-decoration: none;
    transition: background 0.3s, color 0.3s;
}

.hero-img .btn:hover {
    color: white;
    background-color: #DE651A;
}

@media screen and (max-width: 768px) {
    .hero-img {
        height: 60vh; 
        padding-top: 60px;
    }

    .hero-img h1 {
        font-size: 2rem;
    }

    .hero-img p {
        font-size: 1rem;
    }
    
}

.tentang-kami{
    height: auto;
    padding: 2rem;
}

.container-tentang {
    padding: 2rem 0rem 2rem 6rem;
    border: 2px solid #fff8ff;
    border-radius: 15px;
    background-color: #F4E7E1;
    justify-content: space-between;
    display: flex;
}

.tentang-left {
    margin: 2rem;
    max-width: 540px;
}

.tentang-left p {
    padding-top: 0.6rem;
    line-height: 1.2rem;
}

.tentang-logo {
    padding-right: 2rem;
}

.tentang-logo img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
}

@media screen and (max-width: 768px) {
    .tentang-kami {
        height: auto;
        padding: 2rem;
    }
    .container-tentang {
        padding: 3rem 2rem 3rem 2rem;
        display: block;
        justify-content: center;
        text-align: center;
        height: auto;
    }
    .tentang-left {
        margin-bottom: 2rem;
    }
    .tentang-logo img {
        object-fit: cover;
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }
    .tentang-logo {
        margin: 0 auto;
        padding: 0;
    }
}

.favorit { 
    padding: 2rem;
    text-align: center;
}

.container-favorit {
    padding: 2rem 4rem 2rem 4rem;
    border: 2px solid #fff8ff;
    border-radius: 15px;
    background-color: #F4E7E1;
}

.title-favorit {
    text-align: center;
    margin-bottom: 2rem;
    width: 100%;
}

.container-card {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
}

.card-fav {
    width: 220px; 
    height: 370px;
    padding: 0.5rem;
    margin: 0.5rem 2rem 0.5rem 2rem;
    background-color: #fff;
    border: 2px solid #fff8ff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-fav img {
    width: 100%;
    height: 160px;
    border-radius: 5px;
    object-fit: cover;
    background-size: cover;
    background-position: center; 
    background-repeat: no-repeat;
}

.card-fav .deskripsi {
    padding: 0.5rem;
    text-align: center; 
    height: 100%;
    align-items: center;
}

.card-fav h4 {
    font-size: 1.2rem;
    margin: 0.5rem 0;
}

.card-fav p {
    font-size: 0.9rem;
    color: #666;
}

.card-fav h5 {
    font-size: 1rem;
    margin-bottom: 0.5rem;;
}

.card-fav a {
    display: inline-block;
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    background-color: #FF9B45;
    border: 1px solid white;
    color: black;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

.card-fav a:hover {
    color: white;
    background-color: #DE651A;
}

.card-fav:hover {
    transform: scale(1.05);
    transition: transform 0.3s;
}

.card-fav .card-content {
    padding: 0.5rem;
}

@media screen and (max-width: 768px) {
    .container-card {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    .container-favorit {
        display: block;
        text-align: center;
        padding: 1rem 0.5rem 1rem 0.5rem;
    }
    .title-favorit h2{
        font-size: 1.2rem;
        margin: 0.2rem 0;
    }
    .card-fav {
        width: 200px;
        margin-bottom: 1rem;
    }
    .card-fav img {
        height: 160px;
    }
}

.menu {
    padding: 2rem;
    text-align: center;
}

.container-menu {
    padding: 2rem 4rem 2rem 4rem;
    border: 2px solid #fff8ff;
    border-radius: 15px;
    background-color: #F4E7E1;
    text-align: center;
}

.title-menu {
    text-align: center;
    margin-bottom: 2rem;
    width: 100%;
}

.card-menu {
    padding: 0.5rem;
    height: 370px;
    background-color: #fff;
    border: 2px solid #fff8ff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 0.5rem 2rem 0.5rem 2rem;
    width: 200px; 
}

.card-menu img {
    width: 100%;
    height: 160px;
    border-radius: 5px;
    object-fit: cover;
    background-size: cover;
    background-position: center; 
}

.card-menu .deskripsi {
    padding: 0.5rem;
    color: black;
    text-align: center; 
    height: 100%;
    align-items: center;
}

.card-menu h4 {
    font-size: 1.2rem;
    margin: 0.5rem 0;
}

.card-menu p {
    font-size: 0.9rem;
    color: #666;
}

.card-menu h5 {
    font-size: 1rem;
    margin-bottom: 0.5rem;;
}

.card-menu .a-menu {
    display: inline-block;
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    background-color: #FF9B45;
    border: 1px solid rgb(0, 0, 0);
    color: black;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

.card-menu a:hover {
    color: white;
    background-color: #DE651A;
}

.card-menu:hover {
    transform: scale(1.05);
    transition: transform 0.3s;
}

.btn {
    font-family: 'roboto';
    display: inline-flex; 
    align-items: center;
    margin-top: 1rem;
    padding: 0.5rem 1rem;
    background-color: #FF9B45;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

.btn span {
    margin-right: 0.5rem;
    font-size: 1rem; 
}

.btn svg {
    width: 2em; 
    height: 2em;
    vertical-align: middle;
    transition: color 0.3s;
}

.btn svg:hover{
    color: white;
}

.btn:hover {
    color: white;
    background-color: #DE651A;
}

.btn a {
    color: white;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

@media screen and (max-width: 768px) {
    .container-menu {
        padding: 1rem 0.5rem 1rem 0.5rem;
        display: block;
        text-align: center;
    }
    .card-menu {
        width: 200px;
        margin-bottom: 1rem;
    }
    .title-menu h2{
        font-size: 1.2rem;
        margin: 0.2rem 0;
    }
    .card-menu img {
        height: 160px;
    }
}

.kata-mereka {
    padding: 2rem;
}

.container-kata {
    width: 100%;
    padding: 2rem 4rem 2rem 4rem;
    border: 2px solid #fff8ff;
    border-radius: 15px;
    background-color: #F4E7E1;
}

.title-kata {
    text-align: center;
    margin-bottom: 2rem;
}

.card-kata {
    padding: 0.5rem;
    height: 150px;
    background-color: #F4A261;
    border: 2px solid #fff8ff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 0.5rem 2rem 0.5rem 2rem;
    width: 540px; 
}

.card-kata .deskripsi-kata {
    padding: 1rem;
    gap: 1rem;
    color: white;
    text-align: center; 
    height: 100%;
    align-items: center;
}

.card-kata h4 {
    font-size: 1.2rem;
    margin: 0.5rem 0;
}

.card-kata p {
    font-size: 1rem;
    color: #521c0d;
}

.card-kata h5 {
    font-size: 1rem;
    color: #D7780B;
    margin-bottom: 0.5rem;;
}

.card-kata a {
    display: inline-block;
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    background-color: #D7780B;
    border: 1px solid white;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s;
}

@media screen and (max-width: 768px) {
    .card-kata {
        width: 100%;
        max-width: 540px;
        margin: 0 auto;
    }
    .container-kata {
        padding: 1rem 0.5rem 1rem 0.5rem;
        display: block;
        text-align: center;
    }
    .card-kata {
        max-width: 200px;
        min-width: 150px;
        height: 170px;
        margin-bottom: 1rem;
    }
}

footer {
    width: 100%;
    background-color: #E5720F;
    padding: 1rem 0;
    align-items: center;
    font-family: 'Montserrat', sans-serif;
    display: flex;
    flex-direction: column;
}

.container-footer {
    width: 100%;
    max-width: 1200px;
    justify-content: space-between;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    box-sizing: border-box;
    flex-wrap: nowrap;
    margin: 0 auto;
    padding: 2rem;
}

.footer-left {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    gap: 0.75rem;
    margin-bottom: 1rem;
    max-width: 320px;
}

.footer-left h2 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    font-family: 'lobster';
}

.footer-mid {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    gap: 0.5rem;
    margin-bottom: 1rem;
    text-decoration: none;
}

.footer-mid h2 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.footer-mid li a {
    color: black;
    line-height: 2;
    text-decoration: none;
    padding: 0.3rem 1rem;
    border-radius: 5px;
    transition: background-color 0.5s, color 0.3s;
}

.footer-mid li {
    list-style: none;
}

.footer-mid li a:hover {
    color: white;
    background-color: #DE651A;
    padding: 0.3rem 1rem;
}

.footer-kontak {
    max-width: 320px;
    display: flex;
    flex-direction: column;
    text-align: left;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
}

.footer-kontak h2 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.footer-kontak p {
    font-size: 0.9rem;
    line-height: 1.2rem;
}

.footer-kontak .sosmed{
    display: flex;
    gap: 1rem;
    margin: 0;
    padding: 0;
    list-style: none;
}

.footer-kontak .sosmed li {
    display: inline-block;
}

.footer-kontak .sosmed li a svg {
    color: black;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-kontak .sosmed li a svg:hover {
    color: white;
}

.footer-kontak .container-kontak{
    display: flex;
    flex-direction: column;
    text-align: left;
    gap: 0.5rem;
}

.footer-kontak .container-kontak li{
    list-style: none;
    line-height: 1.2;
}

.footer-bottom {
    width: 100%;
    text-align: center;
    font-size: 14px;
    padding-top: 10px;
    border-top: 1px solid #444;
}

@media screen and (max-width: 768px) {
    .container-footer {
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        gap: 1rem;
    }
    .footer-left, .footer-mid, .footer-kontak {
        width: 100%;
        max-width: 100%;
        text-align: center;
        align-items: center;
    }
    .footer-left, .footer-mid, .footer-kontak {
        text-align: center;
    }
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h22M5 16h22M5 24h22"/></svg>
                    </span>
                </button>
            </div>
            <div class="navbar-item" id="navbar-item">
                <ul>
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item tas">
                        <a class="nav-link cart" href="/cart" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2"><path stroke-linejoin="round" d="M2.31 11.243A1 1 0 0 1 3.28 10h17.44a1 1 0 0 1 .97 1.242l-1.811 7.243A2 2 0 0 1 17.939 20H6.061a2 2 0 0 1-1.94-1.515z"/><path stroke-linecap="round" d="M9 14v2m6-2v2m-9-6l4-6m8 6l-4-6"/></g></svg></a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="nav-link active" href="buyer/account">Akun</a>
                        @endguest
                    </li>
                </ul>
            </div>  
        </div>
    </nav>
    <div id="home" class="hero-img">
        <div class="container-hero-img">
            <h1>Selamat Datang di Pawon Adji</h1>
            <p>Nikmati berbagai hidangan lezat kami</p>
            <a href="#konten" class="btn">Berbelanja 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
            </a>
        </div>
    </div>
    <div class="konten" id="konten">
        <div class="container-konten">
            <section class="favorit">
                <div class="container-favorit">
                    <div class="title-favorit title">
                        <h2>Yang Sering Dicari</h2>
                    </div>
                    <div class="container-card">
                        @foreach ($products->take(3) as $product)
                            <div class="card-fav">
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                <div class="deskripsi">
                                    <h4>{{ $product->name }}</h4>
                                    <h5>Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                                    <p>{{ $product->description }}</p>
                                    @auth
                                        @if (auth()->user()->role === 'buyer')
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
                                                <button type="submit" class="btn" style="background-color: #FF9B45; color: black;">Pesan Sekarang</button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}">Pesan Sekarang</a>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section id="menu" class="menu">
                <div class="container-menu">
                    <div class="title-menu title">
                        <h2>Produk Kami</h2>
                    </div>
                    <div class="container-card">
                        @foreach ($products as $product)
                            @if (!request('category') || $product->category_id == request('category'))
                                <div class="card-menu">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                    <div class="deskripsi">
                                        <h4>{{ $product->name }}</h4>
                                        <h5>Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                                        <p>{{ $product->description }}</p>
                                        @auth
                                            @if (auth()->user()->role === 'buyer')
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
                                                    <button type="submit" class="a-menu" style="background-color: #FF9B45; color: black;">Tambah ke Keranjang</button>
                                                </form>
                                            @endif
                                        @else
                                            <a class="a-menu" href="{{ route('login') }}">Tambah ke Keranjang</a>
                                        @endauth
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div style="margin-top: 2rem;">
                        <strong>Filter Kategori:</strong>
                        <a href="{{ route('home') }}" style="margin: 0 10px; text-decoration: none; color: #007bff;">Semua</a>
                        @foreach ($categories as $category)
                            <a href="?category={{ $category->id }}" style="margin: 0 10px; text-decoration: none; color: #007bff;">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="tentang-kami">
                <div class="container-tentang">
                    <div class="tentang-left">
                        <h1>Cerita Kami</h1>
                        <p>Kami percaya bahwa setiap rasa membawa kenangan. Pawon Adji hadir untuk menghidupkan kembali rasa tradisional khas Indonesia melalui resep warisan keluarga yang otentik, dibuat dengan penuh cinta dan bahan-bahan lokal terbaik.</p>
                    </div>
                    <div class="tentang-logo">
                        <img src="{{ asset('images/rumah_nenek.png') }}" alt="Pawon Adji">
                    </div>
                </div>
            </section>
            <section class="kata-mereka">
                <div class="container-kata">
                    <div class="title-kata title">
                        <h2>Kata Mereka</h2>
                    </div>
                    <div class="container-card">
                        @foreach ($reviews as $review)
                            <div class="card-kata">
                                <div class="deskripsi-kata">
                                    <p>"{{ $review->comment }}"</p>
                                    <h4>{{ $review->user->name }} - Rating: {{ $review->rating }} / 5</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <div class="container-footer">
            <div class="footer-left">
                <h2>Pawon Adji</h2>
                <p>Menyajikan cita rasa nusantara yang penuh kenangan. Dari dapur masa lalu untuk hari ini.</p>
            </div>
            <div class="footer-mid">
                <h2>Menu</h2>
                <ul>
                    <li><a href="#home">Jajanan SD</a></li>
                    <li><a href="#kontak">Katering</a></li>
                    <li><a href="#menu">Jajanan Pasar</a></li>
                    <li><a href="#menu">Kue Tradisonal</a></li>
                </ul>
            </div>
            <div class="footer-kontak" id="kontak">
                <h2>Hubungi Kami</h2>
                <div class="container-sosmed">
                    <ul class="sosmed">
                        <li><a href="" class="footer-links"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95"/></svg></a></li>
                        <li><a href="" class="footer-links"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M3 11c0-3.771 0-5.657 1.172-6.828S7.229 3 11 3h2c3.771 0 5.657 0 6.828 1.172S21 7.229 21 11v2c0 3.771 0 5.657-1.172 6.828S16.771 21 13 21h-2c-3.771 0-5.657 0-6.828-1.172S3 16.771 3 13zm15-3.5a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M14 13a2 2 0 1 1-4 0a2 2 0 0 1 4 0m2 0a4 4 0 1 1-8 0a4 4 0 0 1 8 0" clip-rule="evenodd"/></svg></a></li>
                        <li><a href="" class="footer-links"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48"/></svg></a></li>
                    </ul>
                    <h4>@adji_pawon.official</h4>
                </div>
                <div class="container-kontak">
                    <ul>
                        <li><h3>Alamat: Jl. 123 No.23 Rt09/Rw02 Cipayung, Kota Depok, Jawa Barat</h3></li>
                        <li><p>Jam operasional: 08:00 - 16:00</p></li>
                        <li><p>Telepon: 0812-3456-7890</p></li>
                        <li><p>Email: mbadind69@gmail.com</p></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Pawon Adji. All rights reserved.</p>
        </div>  
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