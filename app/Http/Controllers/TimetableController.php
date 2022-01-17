<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Models\Timetable;
use App\Models\Room;
use App\Models\User;
use \PDF;
use Illuminate\Support\Facades\DB;



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

        /*$weekDays = Timetable::WEEK_DAYS;
        $calendarData = $calendarService->generateCalendarData($weekDays);

        return view('timetable.index', compact('weekDays', calendarData)); */

    }

    public function show(Room $room)
    {

        $timetables = DB::table('timetables')->where('sala', '=', $room->idsala)->get();
        $users = User::all();

        $monday = Timetable::where('sala', '=', $room->idsala)->where('dia_semana', '=', '1')->get();
        $tuesday =   Timetable::where('sala', '=', $room->idsala)->where('dia_semana', '=', '2')->get();
        $wednesday =   Timetable::where('sala', '=', $room->idsala)->where('dia_semana', '=', '3')->get();
        $thursday =   Timetable::where('sala', '=', $room->idsala)->where('dia_semana', '=', '4')->get();
        $friday =   Timetable::where('sala', '=', $room->idsala)->where('dia_semana', '=', '5')->get();

        return view('timetable.show',compact('timetables', 'users', 'room', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'));


        //$weekDays = Timetable::WEEK_DAYS;
        //$calendarData = $calendarService->generateCalendarData($weekDays);

        //return view('timetable.index', compact('weekDays', 'calendarData'));
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
            ['hora_inicio','=',$request->hora_inicio],
            ['hora_fim','=',$request->hora_fim],
            ['user','=',$request->user]
        ])->exists() ) {
            return redirect()->route('rooms.index')->with('unsuccess', 'Appointment cannot be created. Room is already been used at that time');
        }
        else {
            Timetable::create($request->all());
            return redirect()->route('stripe.payment');

            //Timetable::create($request->all());
            //return redirect()->route('rooms.index')
            //    ->with('success', 'Appointment created successfully.');
        }
    }

}
