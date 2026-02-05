    @extends('admin.layout.app')

    @section('title','Hi! Admin')
    @section('content')

    <div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">

        <h2 class="text-xl font-bold mb-6">Add Upcoming Event</h2>

        @if ($errors->any())
    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded">
        <ul class="list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('admin.events.store') }}"
        method="POST"
        enctype="multipart/form-data"
        x-data="{ preview: null }">
    @csrf

            <!-- Title -->
            <div class="space-y-5">
            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Event Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('title') }}" required>
            </div>

            <div>
        <label class="text-sm font-medium">Image</label>
        <input type="file"
            name="image"
            accept="image/*"
            @change="preview = URL.createObjectURL($event.target.files[0])"
            class="block w-full text-sm">
        <img x-show="preview"
            :src="preview"
            class="mt-3 w-40 h-40 object-cover rounded-lg border">
    </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md" rows="3">{{ old('description') }}</textarea>
            </div>

            <!-- Date -->
            <div class="mb-4">
                <label for="date" class="block font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('date') }}" required>
            </div>
            <div>
        <label for="end_date" class="block font-medium text-gray-700">End Date</label>
        <input type="date" name="end_date" class="w-full mt-1 rounded-lg border-gray-300" value="{{ old('end_date') }}" required>
            </div>

            <!-- Start Time -->
            <div class="mb-4">
                <label for="time" class="block font-medium text-gray-700">Start Time</label>
                <input type="time" name="time" id="time" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('time') }}">
            </div>


            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('location') }}">
            </div>

        
            <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('admin.events.index') }}"
                    class="px-5 py-2 rounded-full border text-sm text-gray-700 hover:bg-gray-100">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-6 py-2 rounded-full bg-black text-sm text-white hover:bg-gray-800">
                    Save Event
                    </button>
                </div>
                </div>
        </form>

    </div>
    @endsection
