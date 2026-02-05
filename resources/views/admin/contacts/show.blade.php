@extends('admin.layout.app')

@section('title','Contact Detail')

@section('content')
<div class="bg-white rounded-xl p-6 max-w-3xl">

    <h2 class="text-xl font-semibold mb-4">
        {{ $contact->subject ?? 'No Subject' }}
    </h2>

    <div class="mb-4 text-sm text-gray-600">
        <strong>{{ $contact->name }}</strong> —
        {{ $contact->email }}
    </div>

    <div class="border-t pt-4 text-gray-700 leading-relaxed">
        {{ $contact->message }}
    </div>

</div>
@endsection
