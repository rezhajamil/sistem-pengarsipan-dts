<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->event || $request->event == 'all') {
            $participants = EventParticipant::with(['dataEvent', 'dataUser'])->orderBy('event', 'desc')->paginate(50);
        } else {
            $participants = EventParticipant::with(['dataEvent', 'dataUser'])->where('event', $request->event)->orderBy('event', 'desc')->paginate(50);
        }
        $events = Event::orderBy('title', 'asc')->get();
        $title = 'Participant';
        return view('participant.index', compact('participants', 'events', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventParticipant $eventParticipant)
    {
        EventParticipant::destroy($eventParticipant->id);

        return back();
    }

    public function register(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $event_id = $request->id;
        $user_id = Auth::user()->id;

        $is_registered = EventParticipant::where('event', $event_id)->where('user', $user_id)->count();

        if ($is_registered) {
            return back()->with('error', 'Anda Sudah Mendaftar');
        } else {
            $register = EventParticipant::create([
                'event' => $event_id,
                'user' => $user_id,
            ]);

            return back()->with('success', 'Anda Berhasil Mendaftar');
        }
    }
}
