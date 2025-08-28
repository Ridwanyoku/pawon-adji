<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        $reviews = Review::with('user')->get();
        return view('welcome', [
            'title' => 'Pawon Adji',
            'categories' => $categories,
            'products' => $products,
            'reviews' => $reviews,
        ]);
    }
}