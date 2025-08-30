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
        .products-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: #E5720F;
            margin-bottom: 1rem;
            text-align: center;
        }
        .products-welcome {
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
        .error-box {
            color: #dc3545;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 1rem;
        }
        .form-section {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .form-section label {
            display: block;
            margin-bottom: 5px;
            color: #521c0d;
        }
        .form-section input,
        .form-section textarea,
        .form-section select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .form-section button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #218838;
        }
        .products-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .products-table th, .products-table td {
            padding: 10px;
            text-align: left;
        }
        .products-table th {
            background-color: #f8f9fa;
            color: #521c0d;
        }
        .products-table tr {
            border-bottom: 1px solid #eee;
        }
        .products-table td {
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
        .btn-simpan {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            margin-left: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-simpan:hover {
            background-color: #0056b3;
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
                        <a class="nav-link" href="{{ route('seller.orders') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('seller.products') }}">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="konten">
        <div class="products-title">{{ $title }}</div>
        <div class="products-welcome">Selamat datang, {{ auth()->user()->name }}!</div>
        <form method="POST" action="{{ route('logout') }}" style="text-align:center; margin-bottom:1rem;">
            @csrf
            <button type="submit" style="background-color:#E5720F; color:white; border-radius:5px; padding:0.7rem 1.5rem; border:none; cursor:pointer;">Logout</button>
        </form>
        @if (session('success'))
            <div class="success-box">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="error-box">{{ session('error') }}</div>
        @endif

        <h2 style="color: #333; text-align:center;">Kelola Produk</h2>
        <form action="{{ route('seller.products.store') }}" method="POST" class="form-section">
            @csrf
            <label for="product_name">Nama Produk</label>
            <input type="text" name="name" id="product_name" required>
            <label for="product_description">Deskripsi</label>
            <textarea name="description" id="product_description" required></textarea>
            <label for="product_price">Harga (Rp)</label>
            <input type="number" name="price" id="product_price" required>
            <label for="product_category">Kategori</label>
            <select name="category_id" id="product_category" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Tambah Produk</button>
        </form>
        <table class="products-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <form action="{{ route('seller.products.update', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="text" name="name" value="{{ $product->name }}" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 150px;">
                        </td>
                        <td>
                                <textarea name="description" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 150px;">{{ $product->description }}</textarea>
                        </td>
                        <td>
                                <input type="number" name="price" value="{{ $product->price }}" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 80px;">
                        </td>
                        <td>
                                <select name="category_id" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 120px;">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </td>
                        <td>
                                <button type="submit" class="btn-simpan">Simpan</button>
                            </form>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus produk?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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