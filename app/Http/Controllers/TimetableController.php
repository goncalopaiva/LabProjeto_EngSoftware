<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Models\Timetable;
use App\Models\Room;
use \PDF;


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
        $timetables = Timetable::all();
        return view('timetable.create', compact('timetables', 'room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Room $room)
    {
        $request->validate([
            'dia_semana' => 'required',
            'hora_inicio' => 'required',
        ]);

        if (Timetable::where([
            ['sala', '=', $request->sala],
            ['dia_semana', '=', $request->dia_semana],
            ['hora_inicio','=',$request->hora_inicio]
        ])->exists() ) {
            return redirect()->route('rooms.index')->with('unsuccess', 'Appointment cannot be created. Room is already been used at that time');
        }
        else {
            Timetable::create($request->all());
            return redirect()->route('rooms.index')
                ->with('success', 'Appointment created successfully.');
        }
    }

}
