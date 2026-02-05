@extends('admin.layout.app')

@section('title', 'Hi! Admin')
@section('content')

<h2 class="text-xl font-semibold mb-6">Add Product</h2>

<div class="bg-white rounded-xl p-6 shadow-sm max-w-xl">

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" x-data="{ preview: null }">
        @csrf

        <div class="space-y-5">

            <!-- NAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Product Name
                </label>
                <input type="text" name="name" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>
                <textarea name="desc" rows="4"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800"></textarea>
            </div>

            <!-- CATEGORY -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Category
                </label>
                <select name="category_id" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
                    <option value="">-- Choose Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
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
                <input type="number" name="price" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
            </div>

            <!-- STOCK -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Stock
                </label>
                <input type="number" name="stock" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
            </div>

            <!-- MARKETPLACE URLS -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Shopee URL
                </label>
                <input type="url" name="url1" placeholder="https://shopee.co.id/..."
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Tokopedia URL
                </label>
                <input type="url" name="url2" placeholder="https://tokopedia.com/..."
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Blibli URL
                </label>
                <input type="url" name="url3" placeholder="https://blibli.com/..."
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                    focus:ring-2 focus:ring-gray-800 focus:border-gray-800">
            </div>

            <!-- IMAGE UPLOAD -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Product Image
                </label>

                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 rounded-lg border flex items-center justify-center bg-gray-50">
                        <template x-if="preview">
                            <img :src="preview" class="w-full h-full object-cover rounded-lg">
                        </template>
                        <template x-if="!preview">
                            <span class="text-xs text-gray-400">No image</span>
                        </template>
                    </div>

                    <input type="file" name="image" accept="image/*"
                        @change="preview = URL.createObjectURL($event.target.files[0])"
                        class="block text-sm text-gray-600
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:bg-gray-100 file:text-gray-700
                        hover:file:bg-gray-200 cursor-pointer">
                </div>
            </div>

            <!-- ACTION -->
            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('admin.products.index') }}"
                    class="px-4 py-2 text-sm rounded-lg border border-gray-300
                    text-gray-600 hover:bg-gray-100 transition">
                    Cancel
                </a>

                <button type="submit"
                    class="px-5 py-2 text-sm rounded-full
                    bg-black text-white hover:bg-gray-800 transition">
                    Save Product
                </button>
            </div>

        </div>
    </form>
</div>

@endsection
