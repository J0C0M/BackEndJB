<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', true)->with('category')->take(8)->get();
        $latestProducts = Product::with('category')->latest()->take(8)->get();

        return view('home', compact('featuredProducts', 'latestProducts'));
    }
}
