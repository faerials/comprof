@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-xl p-6 shadow-sm max-w-xl">

<h2 class="text-xl font-semibold mb-6">Add Article</h2>

@if ($errors->any())
<div class="mb-4 bg-red-50 border border-red-200 rounded-lg p-4">
    <ul class="list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.articles.store') }}"
      method="POST"
      enctype="multipart/form-data"
      x-data="{ preview: null }">
@csrf

<div class="space-y-5">

    <!-- TITLE -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title"
               value="{{ old('title') }}"
               class="w-full mt-1 rounded-lg border-gray-300 focus:ring-black focus:border-black"
               required>
    </div>

    <!-- CONTENT -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Content</label>
        <textarea name="content"
                  rows="5"
                  class="w-full mt-1 rounded-lg border-gray-300 focus:ring-black focus:border-black"
                  required>{{ old('content') }}</textarea>
    </div>

    <!-- IMAGE -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>

        <template x-if="preview">
            <img :src="preview"
                 class="w-40 h-40 mb-3 rounded-lg object-cover border">
        </template>

        <input type="file"
               name="image"
               accept="image/*"
               @change="preview = URL.createObjectURL($event.target.files[0])"
               class="block w-full text-sm text-gray-600">
    </div>

    <!-- ACTION -->
    <div class="flex justify-end gap-2 pt-4">
        <a href="{{ route('admin.articles.index') }}"
           class="px-4 py-2 rounded-full border text-sm">
            Cancel
        </a>

        <button class="px-6 py-2 rounded-full bg-black text-white text-sm">
            Save
        </button>
    </div>

</div>
</form>
</div>
@endsection
