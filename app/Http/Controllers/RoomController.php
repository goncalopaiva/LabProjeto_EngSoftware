<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use DB;

class RoomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$rooms = Room::all();

        $rooms = DB::table('rooms')
            ->orderBy('idsala', 'asc')
            ->get();

        return view('room.index', compact('rooms'));
    }

    public function search(Request $request){
        // Get the search value from the request

        $search = $request->get('search');
        $tipo = $request->get('tipo');

        if ($tipo == '0') {
            $rooms = Room::query()->where('idsala', 'LIKE', "%{$search}%")->orderBy('idsala', 'asc')->get();
        }
        else if ($search == '') {
            $rooms = Room::query()->where('tipo', 'LIKE', "%{$tipo}%")->orderBy('idsala', 'asc')->get();
        }

        else {
            $rooms = Room::query()
            ->where('idsala', 'LIKE', "%{$search}%")
            ->Where('tipo', 'LIKE', "%{$tipo}%")
            ->orderBy('idsala', 'asc')
            ->get();
        }


        // Return the search view with the resluts compacted
        return view('room.search', compact('rooms'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
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
            'idsala' => 'required',
            'tipo' => 'required',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->all());

        return redirect()->route('room.index')
            ->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('room.index')
            ->with('success', 'Room deleted successfully');
    }
}
