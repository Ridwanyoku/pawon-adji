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
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="display: block; text-align: center; color: #007bff; text-decoration: none;">Logout</button>
            </form>
    </header>
    <main style="max-width: 800px; margin: 20px auto;">
        @if (session('success'))
            <p style="color: #28a745; background-color: #d4edda; padding: 10px; border-radius: 5px; text-align: center;">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p style="color: #dc3545; background-color: #f8d7da; padding: 10px; border-radius: 5px; text-align: center;">{{ session('error') }}</p>
        @endif

        <h2 style="color: #333;">Kelola Kategori</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST" style="margin-bottom: 20px;">
            @csrf
            <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <label for="category_name" style="display: block; margin-bottom: 5px;">Nama Kategori</label>
                <input type="text" name="name" id="category_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">Tambah Kategori</button>
            </div>
        </form>
        <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th style="padding: 10px; text-align: left;">Nama</th>
                    <th style="padding: 10px; text-align: left;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="text" name="name" value="{{ $category->name }}" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 150px;">
                                <button type="submit" style="background-color: #007bff; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Simpan</button>
                            </form>
                        </td>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus kategori?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 style="color: #333;">Kelola Produk</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" style="margin-bottom: 20px;">
            @csrf
            <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <label for="product_name" style="display: block; margin-bottom: 5px;">Nama Produk</label>
                <input type="text" name="name" id="product_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <label for="product_description" style="display: block; margin-bottom: 5px; margin-top: 10px;">Deskripsi</label>
                <textarea name="description" id="product_description" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                <label for="product_price" style="display: block; margin-bottom: 5px; margin-top: 10px;">Harga (Rp)</label>
                <input type="number" name="price" id="product_price" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <label for="product_preorder_days" style="display: block; margin-bottom: 5px; margin-top: 10px;">Estimasi Preorder (hari)</label>
                <input type="number" name="estimated_preorder_days" id="product_preorder_days" required value="1" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <label for="product_category" style="display: block; margin-bottom: 5px; margin-top: 10px;">Kategori</label>
                <select name="category_id" id="product_category" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">Tambah Produk</button>
            </div>
        </form>
        <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th style="padding: 10px; text-align: left;">Nama</th>
                    <th style="padding: 10px; text-align: left;">Deskripsi</th>
                    <th style="padding: 10px; text-align: left;">Harga</th>
                    <th style="padding: 10px; text-align: left;">Estimasi Preorder</th>
                    <th style="padding: 10px; text-align: left;">Kategori</th>
                    <th style="padding: 10px; text-align: left;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="text" name="name" value="{{ $product->name }}" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 150px;">
                            </form>
                        </td>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <textarea name="description" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 150px;">{{ $product->description }}</textarea>
                            </form>
                        </td>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="price" value="{{ $product->price }}" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 80px;">
                            </form>
                        </td>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="estimated_preorder_days" value="{{ $product->estimated_preorder_days }}" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 80px;">
                            </form>
                        </td>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <select name="category_id" required style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; width: 120px;">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td style="padding: 10px;">
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus produk?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Hapus</button>
                            </form>
                            <button type="submit" formaction="{{ route('admin.products.update', $product->id) }}" style="background-color: #007bff; color: white; padding: 5px 10px; border: none; border-radius: 5px; margin-left: 5px;">Simpan</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>