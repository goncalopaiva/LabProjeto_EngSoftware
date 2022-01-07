<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Timetable;
use App\Models\Room;


class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $timetables = Timetable::all();
        $rooms = Room::all();
        return view('timetable.index', compact('timetables', 'rooms'));
    }

    public function show(Room $room)
    {
        $timetables = Timetable::all();
        return view('timetable.show',compact('timetables','room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {
        return view('timetable.create');
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
            'sala' => 'required',
            'hora_inicio' => 'required',
        ]);

        Timetable::create($request->all());

        return redirect()->route('timetable.index')
            ->with('success', 'Appointment created successfully.');

    }

}
