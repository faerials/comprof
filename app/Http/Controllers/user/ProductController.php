<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\{Category, Product};
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('status', 'active') // opsional
            ->paginate(12);

        return view('user.products.index', compact('category', 'products'));
    }

public function show($slug, $id)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $product = Product::where('id', $id)
        ->where('category_id', $category->id)
        ->firstOrFail();

    $relatedProducts = Product::where('category_id', $category->id)
        ->where('id', '!=', $id)
        ->take(4)
        ->get();

    return view('user.products.show', compact('product', 'relatedProducts', 'category'));
}


}
