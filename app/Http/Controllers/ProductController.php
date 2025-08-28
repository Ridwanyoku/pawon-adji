<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('welcome', compact('categories', 'products'), ['title' => 'Daftar Produk']);
    }
}