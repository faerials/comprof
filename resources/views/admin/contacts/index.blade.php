@extends('admin.layout.app')

@section('title','Hi! Admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

    <!-- HEADER -->
    <div class="flex justify-between mb-6">
        <h2 class="text-xl font-bold">Contact Messages</h2>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-100 text-gray-600 text-sm">
            <tr>
                <th class="p-3 border w-12 text-center">No</th>
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Email</th>
                <th class="p-3 border">Subject</th>
                <th class="p-3 border w-40">Date</th>
                <th class="p-3 border w-32 text-center">Action</th>
            </tr>
        </thead>

        <tbody class="text-sm">
            @forelse ($contacts as $contact)
                <tr class="hover:bg-gray-50">

                    <!-- NO -->
                    <td class="p-3 border text-center text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <!-- NAME -->
                    <td class="p-3 border font-medium text-gray-800">
                        {{ $contact->name }}
                    </td>

                    <!-- EMAIL -->
                    <td class="p-3 border text-gray-600">
                        {{ $contact->email }}
                    </td>

                    <!-- SUBJECT -->
                    <td class="p-3 border text-gray-600">
                        {{ $contact->subject ?? '-' }}
                    </td>



                    <!-- DATE -->
                    <td class="p-3 border text-gray-600">
                        {{ $contact->created_at->format('d M Y') }}
                    </td>

                    <!-- ACTION -->
                    <td class="p-3 border">
                        <div class="flex justify-center">
                            <a href="{{ route('admin.contacts.show', $contact->id) }}"
                               class="px-4 py-1.5 rounded-full text-sm
                                      bg-gray-200 text-gray-700
                                      hover:bg-gray-300">
                                View
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this messages?')">
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
                    <td colspan="7" class="p-6 text-center text-gray-400">
                        No contact messages yet
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
