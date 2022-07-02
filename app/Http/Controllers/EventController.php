<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);
        $title = 'Events';
        return view('event.index', compact('events', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = EventCategory::all();
        $mode = ['Offline', 'Online', 'Hybrid'];
        $title = 'Events';
        return view('event.create', compact('category', 'title', 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'mode' => 'required',
            'description' => 'required',
            'registration_start' => 'date',
            'registration_end' => 'date',
            'event_start' => 'date',
            'event_end' => 'date',
            'image' => 'image|max:10240'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->store('event');

            $event = Event::create([
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description,
                'mode' => $request->mode,
                'partner' => $request->partner,
                'location' => $request->location,
                'address' => $request->address,
                'registration_start' => $request->registration_start,
                'registration_end' => $request->registration_end,
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
                'image' => $image,
            ]);
        }
        return redirect()->route('admin.event.index')->with('success', 'Berhasil menambah event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $title = 'Events';
        return view('event.show', compact('event', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $title = "Events";
        $category = EventCategory::all();
        $mode = ['Offline', 'Online', 'Hybrid'];
        return view('event.edit', compact('event', 'title', 'category', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'mode' => 'required',
            'description' => 'required',
            'registration_start' => 'date',
            'registration_end' => 'date',
            'event_start' => 'date',
            'event_end' => 'date',
            'image' => 'image|max:10240'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->store('event');
            $event->image = $image;
        }

        $event->title = $request->title;
        $event->category = $request->category;
        $event->mode = $request->mode;
        $event->description = $request->description;
        $event->registration_start = $request->registration_start;
        $event->registration_end = $request->registration_end;
        $event->event_start = $request->event_start;
        $event->event_end = $request->event_end;
        $event->location = $request->location;
        $event->address = $request->address;
        $event->partner = $request->partner;
        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);

        return back();
    }
}
