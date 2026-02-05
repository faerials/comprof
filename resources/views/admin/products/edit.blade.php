@extends('admin.layout.app')

@section('title', 'Hi! Admin')

@section('content')
<div class="bg-white rounded-xl p-6 shadow-sm max-w-xl">

<h2 class="text-xl font-semibold mb-6">Edit Product</h2>

@if ($errors->any())
    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded">
        <ul class="list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.products.update', $product->id) }}"
      method="POST"
      enctype="multipart/form-data"
      x-data="{ preview: '{{ asset('storage/'.$product->image) }}' }">

    @csrf
    @method('PUT')

    <div class="space-y-5">

        <!-- NAME -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Product Name
            </label>
            <input type="text" name="name"
                   value="{{ old('name', $product->name) }}"
                   required
                   class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">
        </div>

        <!-- DESCRIPTION -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea name="desc" rows="4"
                      class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">{{ old('desc', $product->desc) }}</textarea>
        </div>

        <!-- CATEGORY -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Category
            </label>
            <select name="category_id" required
                class="w-full rounded-lg border border-gray-300 px-3 py-2
                focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- PRICE -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Price
            </label>
            <input type="number" name="price"
                   value="{{ old('price', $product->price) }}"
                   required
                   class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">
        </div>

        <!-- STOCK -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Stock
            </label>
            <input type="number" name="stock"
                   value="{{ old('stock', $product->stock) }}"
                   required
                   class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">
        </div>

        <!-- MARKETPLACE URL -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Shopee URL
            </label>
            <input type="url" name="url1"
                   value="{{ old('url1', $product->url1) }}"
                   placeholder="https://shopee.co.id/..."
                   class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Tokopedia URL
            </label>
            <input type="url" name="url2"
                   value="{{ old('url2', $product->url2) }}"
                   placeholder="https://tokopedia.com/..."
                   class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Blibli URL
            </label>
            <input type="url" name="url3"
                   value="{{ old('url3', $product->url3) }}"
                   placeholder="https://blibli.com/..."
                   class="w-full rounded-lg border-gray-300 focus:ring-black focus:border-black">
        </div>

        <!-- IMAGE -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Product Image
            </label>

            <div class="mb-3">
                <img :src="preview"
                     class="w-32 h-32 rounded-lg object-cover border">
            </div>

            <input type="file" name="image" accept="image/*"
                   @change="preview = URL.createObjectURL($event.target.files[0])"
                   class="block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:bg-gray-100 file:text-gray-700
                          hover:file:bg-gray-200">
        </div>

        <!-- ACTION -->
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.products.index') }}"
               class="px-5 py-2 rounded-full border text-sm text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-full bg-black text-sm text-white hover:bg-gray-800">
                Update
            </button>
        </div>

    </div>
</form>
</div>
@endsection
