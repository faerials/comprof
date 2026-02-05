@extends('admin.layout.app')

@section('title','Admin Dashboard')


@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">Products</h3>
        <p class="text-3xl font-bold">
             {{ $productCount }}
        </p>
    </div>
    

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">Gallery</h3>
        <p class="text-3xl font-bold">
             {{ $galleryCount }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">Article</h3>
        <p class="text-3xl font-bold">
             {{ $articleCount }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">Client</h3>
        <p class="text-3xl font-bold">
             {{ $clientCount }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">Event</h3>
        <p class="text-3xl font-bold">
             {{ $eventCount }}
        </p>
    </div>

</div>
@endsection
