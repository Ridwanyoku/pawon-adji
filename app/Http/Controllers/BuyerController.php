<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function dashboard()
    {
        $orders = Order::with(['orderItems.product'])->where('buyer_id', Auth::id())->get();
        $reviews = Review::with('user')->where('user_id', Auth::id())->get();
        return view('buyer.dashboard', [
            'title' => 'Dasbor Pembeli',
            'orders' => $orders,
            'reviews' => $reviews,
        ]);
    }

    public function account()
    {
        $orders = Order::with(['orderItems.product'])->where('buyer_id', Auth::id())->get();
        $reviews = Review::with('user')->where('user_id', Auth::id())->get();
        return view('buyer.account', [
            'title' => 'Akun Pembeli',
            'orders' => $orders,
            'reviews' => $reviews,
        ]);
    }
}