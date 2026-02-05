@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

<div class="flex justify-between mb-6">
    <h2 class="text-xl font-semibold">List Clients</h2>

    <a href="{{ route('admin.clients.create') }}"
       class="px-4 py-2 text-sm rounded-full bg-black text-white hover:bg-gray-800">
        + Add Client
    </a>
</div>

@if(session('success'))
<div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded">
    {{ session('success') }}
</div>
@endif

<table class="w-full border border-gray-200 rounded-lg">
<thead class="bg-gray-100 text-sm text-gray-600">
<tr>
    <th class="p-3 border w-12 text-center"></th>
    <th class="p-3 border">Client</th>
    <th class="p-3 border">Position</th>
    <th class="p-3 border w-64 text-center">Action</th>
</tr>
</thead>

<tbody class="text-sm">
@forelse ($clients as $client)
<tr class="hover:bg-gray-50">
    <td class="p-3 border text-center text-gray-500">
        {{ $loop->iteration }}
    </td>

    <td class="p-3 border">
        <div class="flex gap-3 items-start">
            @if($client->logo)
            <img src="{{ asset('storage/'.$client->logo) }}"
                 class="w-14 h-14 rounded-lg object-cover border">
            @endif

            <div>
                <div class="font-semibold text-gray-800">
                    {{ $client->name }}
                </div>
                <div class="text-xs text-gray-500 line-clamp-2 max-w-md">
                    {{ $client->desc }}
                </div>
            </div>
        </div>
    </td>

     <td class="p-3 border">
        <div class="flex gap-3 items-start">
            <div class="font-semibold text-gray-800">
                    {{ $client->position }}
                </div>
        </div>
    </td>

    <td class="p-3 border">
        <div class="flex justify-center gap-2">

            <a href="{{ route('admin.clients.edit', $client->id) }}"
               class="px-4 py-1.5 rounded-full text-sm
                      bg-blue-100 text-blue-600 hover:bg-blue-200">
                Edit
            </a>

            <form action="{{ route('admin.clients.destroy', $client->id) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this clients?')">
                @csrf
                @method('DELETE')

                <button class="px-4 py-1.5 rounded-full text-sm
                               bg-red-100 text-red-600 hover:bg-red-200">
                    Delete
                </button>
            </form>

        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="3" class="p-6 text-center text-gray-400">
        No clients yet
    </td>
</tr>
@endforelse
</tbody>
</table>

</div>
@endsection
