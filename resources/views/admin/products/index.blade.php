@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold">Product List</h2>

        <a href="{{ route('admin.products.create') }}"
           class="bg-black text-sm text-white px-4 py-2 rounded-full hover:bg-gray-800">
            + Add Product
        </a>
    </div>

    <table class="w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-100 text-sm text-gray-600">
            <tr>
                <th class="p-3 border w-12 text-center">#</th>
                <th class="p-3 border">Product</th>
                <th class="p-3 border w-40">Price</th>
                <th class="p-3 border w-40">Stock</th>
                <th class="p-3 border w-72 text-center">Action</th>
            </tr>
        </thead>

        <tbody class="text-sm">
        @forelse ($products as $product)
            <tr class="hover:bg-gray-50 transition">

                <!-- NOMOR -->
                <td class="p-2 border text-center text-xs text-gray-500 font-medium">
                    {{ $loop->iteration }}
                </td>

                <!-- PRODUK -->
                <td class="p-3 border">
                    <div class="flex gap-3 items-start">
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="w-14 h-14 rounded-lg object-cover border">

                        <div>
                            <div class="font-semibold text-md text-gray-800">
                                {{ $product->name }}
                            </div>

                            <div class="text-sm text-gray-500 max-w-[320px] line-clamp-2">
                                {{ $product->desc }}
                            </div>
                        </div>
                    </div>
                </td>

                <!-- HARGA -->
                <td class="p-3 border font-medium">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </td>

                <!-- STOCK -->
                <td class="p-3 border font-medium">
                    {{ number_format($product->stock, 0, ',', '.') }}
                </td>

                <!-- AKSI -->
                <td class="p-3 border align-top">
                    <div class="flex gap-1 pt-1">

                        <!-- VIEW -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="inline-flex items-center px-4 py-1.5 text-sm
                                       rounded-full bg-gray-200 text-gray-700
                                       hover:bg-gray-300 transition">
                                View
                            </button>

                            <!-- POPOVER -->
<div
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-1 scale-95"
    @click.outside="open = false"
    class="absolute top-full mt-3 z-50
           w-96 max-w-[90vw]
           bg-white border border-gray-200
           rounded-xl shadow-xl p-5
           right-0">

    <!-- HEADER -->
    <div class="flex gap-4">
        <img src="{{ asset('storage/'.$product->image) }}"
             class="w-24 h-24 rounded-lg object-cover border flex-shrink-0">

        <div class="min-w-0">
            <div class="font-semibold text-gray-800 truncate">
                {{ $product->name }}
            </div>

            <div class="text-sm font-medium mt-1 text-gray-700">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>

            <div class="text-xs text-gray-500 mt-1">
                Stock: {{ $product->stock }}
            </div>
        </div>
    </div>

    <!-- DESCRIPTION -->
    <div class="mt-3 text-sm text-gray-600 leading-relaxed break-words">
        {{ $product->desc }}
    </div>

    <!-- ACTION -->
    <div class="mt-4 flex justify-between items-center">

        {{-- LINK E-COMMERCE --}}
        @if (!empty($product->url1))
            <a href="{{ $product->url1 }}"
               target="_blank"
               class="inline-flex items-center gap-2
                      px-4 py-2 text-sm rounded-full
                      bg-green-100 text-green-700
                      hover:bg-green-200 transition">
                🛒 Buka di E-Commerce
            </a>
        @endif

        <button @click="open = false"
                class="text-sm text-gray-500 hover:text-black">
            Close
        </button>
    </div>
</div>

                        </div>

                        <!-- EDIT -->
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="inline-flex items-center px-4 py-1.5 text-sm
                                  rounded-full bg-blue-100 text-blue-600
                                  hover:bg-blue-200 transition">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus produk ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="inline-flex items-center px-4 py-1.5 text-sm
                                           rounded-full bg-red-100 text-red-600
                                           hover:bg-red-200 transition">
                                Delete
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="p-6 text-center text-gray-400">
                    No products yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
