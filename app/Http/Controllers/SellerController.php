<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function orders()
    {
        $orders = Order::with(['buyer', 'orderItems.product'])->get();
        return view('seller.orders', [
            'title' => 'Pesanan Penjual',
            'orders' => $orders,
        ]);
    }

    public function updateStatus(Request $request, $orderId)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $order = Order::findOrFail($orderId);
        $order->update(['status' => $request->status]);

        return redirect()->route('seller.orders')->with('success', 'Status pesanan diperbarui!');
    }

    public function products()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('seller.products', [
            'title' => 'Kelola Produk',
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
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('seller.products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('seller.products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('seller.products')->with('success', 'Produk berhasil dihapus!');
    }
}