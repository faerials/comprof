@extends('admin.layout.app')


@section('title', 'Hi! Admin')
@section('content')

<div class="bg-white rounded-xl p-6 shadow-sm max-w-xl">

<h2 class="text-xl font-semibold mb-6">Edit Gallery</h2>

{{-- ERROR --}}
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4">
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.galleries.update', $gallery->id) }}"
      method="POST"
      enctype="multipart/form-data"
      x-data="{ preview: '{{ asset('storage/'.$gallery->image) }}' }">
@csrf
@method('PUT')

<div class="space-y-5">

    <!-- TITLE -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Title
        </label>
        <input type="text" name="title"
               value="{{ old('title', $gallery->title) }}"
               class="w-full mt-1 rounded-lg border-gray-300 focus:ring-black focus:border-black"
               required>
    </div>

    <!-- IMAGE -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Image
        </label>

        <img :src="preview"
             class="w-40 h-40 mb-3 rounded-lg object-cover border">

        <input type="file"
               name="image"
               accept="image/*"
               @change="preview = URL.createObjectURL($event.target.files[0])"
               class="block w-full text-sm text-gray-600">
    </div>

    <!-- ACTION -->
    <div class="flex justify-end gap-2 pt-4">
        <a href="{{ route('admin.galleries.index') }}"
           class="px-4 py-2 rounded-full border text-sm">
            Cancel
        </a>

        <button class="px-6 py-2 rounded-full bg-black text-white text-sm">
            Update
        </button>
    </div>

</div>
</form>
</div>
@endsection
