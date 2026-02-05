@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="flex justify-between mb-6">
    <h2 class="text-xl font-semibold">Our Gallery</h2>

    <a href="{{ route('admin.galleries.create') }}"
       class="px-4 py-2 rounded-full text-sm bg-black text-white hover:bg-gray-800">
        + Add Image
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
@forelse ($galleries as $gallery)
    <div class="bg-white rounded-xl shadow overflow-hidden group">

        <img src="{{ asset('storage/'.$gallery->image) }}"
             class="w-full h-48 object-cover">

        <div class="p-4">
            <h3 class="font-semibold text-gray-800 truncate">
                {{ $gallery->title }}
            </h3>

            <div class="flex gap-2 mt-3">
                <a href="{{ route('admin.galleries.edit', $gallery->id) }}"
                   class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-600">
                    Edit
                </a>

                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}"
                      method="POST"
                      onsubmit="return confirm('Hapus gambar ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@empty
    <p class="text-gray-500">No pictures yet</p>
@endforelse
</div>
@endsection
