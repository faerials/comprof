<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title'     => 'required|string|max:255',
        'description' => 'required|string',
        'location'  => 'required|string',
        'date'      => 'required|date',
        'time'      => 'required|date_format:H:i',
        'end_date'  => 'required|date|after_or_equal:date',
        'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->only(['title','description','date','end_date','location','time']);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('events','public');
    }

    Event::create($data);

    return redirect()
        ->route('admin.events.index')
        ->with('success','Event created successfully');
}


    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

   public function update(Request $request, Event $event)
{
    $request->validate([
        'title'     => 'required|string|max:255',
        'description' => 'required|string',
        'location'  => 'required|string',
        'date'      => 'required|date',
        'time'      => 'required|date_format:H:i',
        'end_date'  => 'required|date|after_or_equal:date',
        'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->only([
        'title','description','date','end_date','time','location'
    ]);

    if ($request->hasFile('image')) {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $data['image'] = $request->file('image')->store('events','public');
    }

    $event->update($data);

    return redirect()
        ->route('admin.events.index')
        ->with('success','Event updated successfully');
}



    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event Deleted successfully');
    }
}