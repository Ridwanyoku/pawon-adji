<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('buyer_id', Auth::id())->with('product')->get();
        return view('cart', [
            'title' => 'Keranjang Belanja',
            'carts' => $carts,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $existingCart = Cart::where('buyer_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingCart) {
            $existingCart->update(['quantity' => $existingCart->quantity + $request->quantity]);
        } else {
            Cart::create([
                'buyer_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        $cart = Cart::where('buyer_id', Auth::id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('cart')->with('success', 'Produk dihapus dari keranjang!');
    }
}