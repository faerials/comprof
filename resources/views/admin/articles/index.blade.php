@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

<div class="flex justify-between mb-6">
    <h2 class="text-xl font-semibold">Created Articles</h2>

    <a href="{{ route('admin.articles.create') }}"
       class="px-4 py-2 rounded-full bg-black text-sm text-white hover:bg-gray-800">
        + Add Article
    </a>
</div>

@if (session('success'))
<div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded">
    {{ session('success') }}
</div>
@endif

<table class="w-full border border-gray-200 rounded-lg">
<thead class="bg-gray-100 text-sm text-gray-600">
<tr>
    <th class="p-3 border w-12 text-center"></th>
    <th class="p-3 border">Article</th>
    <th class="p-3 border w-64 text-center">Action</th>
</tr>
</thead>

<tbody class="text-sm">
@forelse ($articles as $article)
<tr class="hover:bg-gray-50">
    <td class="p-3 border text-center text-gray-500">{{ $loop->iteration }}</td>

    <td class="p-3 border">
        <div class="flex gap-3 items-start">
            @if($article->image)
            <img src="{{ asset('storage/'.$article->image) }}"
                 class="w-14 h-14 rounded-lg object-cover border">
            @endif

            <div>
                <div class="font-semibold text-gray-800">{{ $article->title }}</div>
                <div class="text-xs text-gray-500 line-clamp-2 max-w-md">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </td>

    <td class="p-3 border">
        <div class="flex justify-center gap-2">

            <!-- VIEW BUTTON + POPOVER -->
             <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="px-4 py-1.5 text-sm rounded-full
                               bg-gray-200 text-gray-700
                               hover:bg-gray-300">
                    View
                </button>

           <div x-show="open"
     x-cloak
     x-transition
     @click.outside="open = false"
     class="absolute top-full mt-3 left-1/2 -translate-x-1/2
                            z-50 w-96 max-w-[90vw]
                            bg-white border rounded-xl shadow-xl p-5">

    <div class="flex gap-4">
        @if($article->image)
        <img src="{{ asset('storage/'.$article->image) }}"
             class="w-24 h-24 rounded-lg object-cover border flex-shrink-0">
        @endif

        <div class="min-w-0">
            <div class="font-semibold text-gray-800">
                {{ $article->title }}
            </div>
            <div class="text-sm text-gray-500 mt-1 break-words">
                {{ $article->content }}
            </div>
        </div>
    </div>

    <div class="mt-4 text-right">
        <button @click="open = false"
                class="text-sm text-gray-500 hover:text-black">
            Close
        </button>
    </div>
</div>
</div>


            <!-- EDIT -->
            <a href="{{ route('admin.articles.edit', $article->id) }}"
               class="inline-flex items-center px-4 py-1.5 text-sm
                      rounded-full bg-blue-100 text-blue-600
                      hover:bg-blue-200 transition">
                Edit
            </a>

            <!-- DELETE -->
            <form action="{{ route('admin.articles.destroy', $article->id) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this article?')">
                @csrf
                @method('DELETE')

                <button class="inline-flex items-center px-4 py-1.5 text-sm
                               rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">
                    Delete
                </button>
            </form>

        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="3" class="p-6 text-center text-gray-400">
        No articles yet
    </td>
</tr>
@endforelse
</tbody>
</table>


</div>
@endsection
