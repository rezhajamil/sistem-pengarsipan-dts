<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with(['evCategory'])->orderBy('category')->orderBy('registration_start','asc')->get();
        $active = Event::with(['evCategory'])->select('category')->distinct()->get();
        return view('welcome', compact('events', 'active'));
    }
}
