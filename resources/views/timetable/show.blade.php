@extends('timetable.index')

@section('timetable')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<a>Room: {{$room->idsala}} </a> <br><br>

<table class="table table-borderless" style="font-size:12px">

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
        @foreach($timetables as $timetable)
            @if ($timetable->dia_semana == $j && $timetable->hora_inicio == $i && $timetable->sala == $room->idsala)
                <td style="background-color:#C6D8FF"></td>
            @endif
        @endforeach
    @endfor
    </tr>
@endfor


</table>



@endsection
