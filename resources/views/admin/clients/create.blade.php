@extends('admin.layout.app')

@section('title', 'Hi! Admin')

@section('content')
    <div class="bg-white rounded-xl p-6 shadow-sm max-w-xl">

        <h2 class="text-xl font-semibold mb-6">Add Client</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data"
            x-data="{ preview: null }">
            @csrf

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full mt-1 rounded-lg border-gray-300" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Position</label>
                    <input type="text" name="position" value="{{ old('position') }}" class="w-full mt-1 rounded-lg border-gray-300" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="desc" rows="4"
                        class="w-full mt-1 rounded-lg border-gray-300">{{ old('desc') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Logo</label>

                    <template x-if="preview">
                        <img :src="preview" class="w-40 h-40 mb-3 rounded-lg object-cover border">
                    </template>

                    <input type="file" name="logo" accept="image/*"
                        @change="preview = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm">
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <a href="{{ route('admin.clients.index') }}" class="px-4 py-2 rounded-full text-sm border">
                        Cancel
                    </a>

                    <button class="px-6 py-2 rounded-full text-sm bg-black text-white">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection