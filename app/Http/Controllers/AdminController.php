<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'estimated_preorder_days' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'estimated_preorder_days' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus!');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil dihapus!');
    }
}