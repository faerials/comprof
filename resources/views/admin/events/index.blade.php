@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

    <div class="flex justify-between mb-6">
        <h2 class="text-xl font-bold">Upcoming Events</h2>

        <a href="{{ route('admin.events.create') }}"
           class="px-4 py-2 rounded-full bg-black text-sm text-white hover:bg-gray-800">
            + Add Event
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
    @endif

    <table class="w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-100 text-gray-600 text-sm">
            <tr class="hover:bg-gray-50 transition" x-data="{ open: false }">
                <th class="p-3 border w-12 text-center"></th>
                <th class="p-3 border">Event</th>
                <th class="p-3 border">Image</th>
                <th class="p-3 border w-40">Date</th>
                <th class="p-3 border w-40">End Date</th>
                <th class="p-3 border w-48">Location</th>
                <th class="p-3 border w-32">Start Time</th>
                <th class="p-3 border w-64 text-center">Action</th>
            </tr>
        </thead>

        <tbody class="text-sm">
@forelse ($events as $event)
<tr class="hover:bg-gray-50">

    <!-- NO -->
    <td class="p-3 border text-center text-gray-500">
        {{ $loop->iteration }}
    </td>

    <!-- EVENT -->
    <td class="p-3 border">
        <div class="font-semibold text-gray-800">
            {{ $event->title }}
        </div>
        <div class="text-xs text-gray-500 line-clamp-2 max-w-md">
            {{ $event->description }}
        </div>
    </td>

    <!-- IMAGE -->
    <td class="p-3 border text-center">
        @if($event->image)
            <img src="{{ asset('storage/'.$event->image) }}"
                 class="w-14 h-14 object-cover rounded-lg mx-auto border">
        @endif
    </td>

    <!-- DATE -->
    <td class="p-3 border">
        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
    </td>

    <!-- END DATE -->
    <td class="p-3 border">
        {{ $event->end_date
            ? \Carbon\Carbon::parse($event->end_date)->format('d M Y')
            : '-' }}
    </td>

    <!-- LOCATION -->
    <td class="p-3 border">
        {{ $event->location ?? '-' }}
    </td>

    <!-- START TIME -->
    <td class="p-3 border">
        {{ $event->time
            ? \Carbon\Carbon::parse($event->time)->format('H:i')
            : '-' }}
    </td>

    <!-- ACTION -->
    <td class="p-3 border">
        <div class="flex justify-center gap-2">

            <!-- VIEW / POPOVER -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="px-4 py-1.5 text-sm rounded-full
                               bg-gray-200 text-gray-700
                               hover:bg-gray-300">
                    View
                </button>

                <!-- POPOVER -->
                <div x-show="open"
                     x-cloak
                     x-transition
                     @click.outside="open = false"
                     class="absolute top-full mt-3 left-1/2 -translate-x-1/2
                            z-50 w-96 max-w-[90vw]
                            bg-white border rounded-xl shadow-xl p-5">

                    <div class="flex gap-4">
                        @if($event->image)
                        <img src="{{ asset('storage/'.$event->image) }}"
                             class="w-20 h-20 rounded-lg object-cover border">
                        @endif

                        <div>
                            <div class="font-semibold text-gray-800">
                                {{ $event->title }}
                            </div>
                            <div class="text-sm text-gray-500 mt-1">
                                {{ $event->location }}
                            </div>
                              <div class="text-xs text-gray-400 mt-1">
                                {{ $event->time
                                ? \Carbon\Carbon::parse($event->time)->format('H:i')
                                : '-' }}
                            </div>
                            <div class="text-xs text-gray-400 mt-1">
                                {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                @if($event->end_date)
                                    – {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-sm text-gray-600 max-h-32 overflow-y-auto">
                        {{ $event->description }}
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
            <a href="{{ route('admin.events.edit', $event->id) }}"
               class="px-4 py-1.5 rounded-full text-sm
                      bg-blue-100 text-blue-600 hover:bg-blue-200">
                Edit
            </a>

            <!-- DELETE -->
            <form action="{{ route('admin.events.destroy', $event->id) }}"
                  method="POST"
                  onsubmit="return confirm('Hapus event ini?')">
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
    <td colspan="8" class="p-6 text-center text-gray-400">
        No upcoming events yet
    </td>
</tr>
@endforelse
</tbody>

    </table>

</div>
@endsection
