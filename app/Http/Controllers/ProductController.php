<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Gallery, Product};

class ProductController extends Controller
{
    

public function index()
{
    $products = Product::orderBy('created_at', 'desc')->get();
    $galleries = Gallery::latest()->get();
    return view('user.home', compact('products', 'galleries'));
}

}
