@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-xl p-6 shadow-sm max-w-xl">

<h2 class="text-xl font-semibold mb-6">Edit Client</h2>

@if ($errors->any())
<div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
    <ul class="list-disc list-inside text-sm space-y-1">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form
    action="{{ route('admin.clients.update', $client->id) }}"
    method="POST"
    enctype="multipart/form-data"
    x-data="{
        preview: '{{ $client->logo ? asset('storage/'.$client->logo) : '' }}'
    }"
>
    @csrf
    @method('PUT')


<div class="space-y-5">

    <div>
        <label class="block text-sm font-medium">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $client->name) }}"
               class="w-full mt-1 rounded-lg border-gray-300"
               required>
    </div>

    <div>
        <label class="block text-sm font-medium">Position</label>
        <input type="text" name="position"
               value="{{ old('position', $client->position) }}"
               class="w-full mt-1 rounded-lg border-gray-300"
               required>
    </div>

    <div>
        <label class="block text-sm font-medium">Description</label>
        <textarea name="desc"
                  rows="4"
                  class="w-full mt-1 rounded-lg border-gray-300">{{ old('desc', $client->desc) }}</textarea>
    </div>

     <!-- IMAGE -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Logo
                </label>

                <!-- PREVIEW -->
                <div class="mb-3">
                    <img :src="preview"
                         class="w-32 h-32 rounded-lg object-cover border">
                </div>

                <input type="file"
                       name="logo"
                       accept="image/*"
                       @change="preview = URL.createObjectURL($event.target.files[0])"
                       class="block w-full text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:bg-gray-100 file:text-gray-700
                              hover:file:bg-gray-200">
                @error('logo')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

    <div class="flex justify-end gap-2 pt-4">
        <a href="{{ route('admin.clients.index') }}"
           class="px-4 py-2 rounded-full border text-sm">
            Cancel
        </a>

        <button type="submit" class="px-6 py-2 rounded-full text-sm bg-black text-white">
            Update
        </button>
    </div>

</div>
</form>
</div>
@endsection
