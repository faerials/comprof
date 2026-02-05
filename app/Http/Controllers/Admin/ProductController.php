<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\{Category, Product};
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
 
   public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

   
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

  
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'desc'        => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',

     
            'url1' => 'nullable|url|max:255',
            'url2' => 'nullable|url|max:255',
            'url3' => 'nullable|url|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

     
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product added successfully');
    }

  
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'desc'        => 'required|string',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',

           
            'url1' => 'nullable|url|max:255',
            'url2' => 'nullable|url|max:255',
            'url3' => 'nullable|url|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

     
        if ($request->hasFile('image')) {

            // hapus image lama
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }   

}
