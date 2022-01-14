<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Room;
use App\Models\Timetable;


class PDFController extends Controller
{
    public function generatePDF(Room $room)
    {
        $timetables = Timetable::all();
        $ldate = date('Y-m-d H:i:s');
        $data = [
            'timetables' => $timetables,
            'room' => $room,
            'ldate' => $ldate
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('Timetable_Room{{$room->idsala}}.pdf');
    }
}
