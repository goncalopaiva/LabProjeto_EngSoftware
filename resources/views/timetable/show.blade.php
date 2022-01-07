@extends('timetable.index')

@section('timetable')

<a>Room: {{$room->idsala}} </a> <br><br>

<table class="table" style="font-size:12px">

<tr>
    <th>Time</th>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
</tr>

@for ($i=8; $i <= 20; $i++)
    <tr>
        <td> {{$i}}:00</td>
    @for ($j=1; $j <= 5; $j++)
        <td>
            @foreach($timetables as $timetable)
                @if ($timetable->dia_semana == $j && $timetable->hora_inicio == $i && $timetable->sala == $room->idsala)
                    A
                @endif
            @endforeach
        </td>
    @endfor
    </tr>
@endfor


</table>



@endsection
