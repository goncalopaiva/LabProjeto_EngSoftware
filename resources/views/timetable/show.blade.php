@extends('timetable.index')

@section('timetable')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif




<a>Room: {{$room->idsala}} </a> <br><br>

<table class="table table-bordered" style="font-size:12px">

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
            @if ($timetable->dia_semana == $j && $timetable->hora_inicio == $i)
                @foreach($users as $user)
                    @if ($user->id == $timetable->user)
                        <td style="background-color:#C6D8FF; font-size:9px" class="text-center table-bordered">
                            {{ $user->name }}
                        </td>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endfor
    </tr>
@endfor
</table>


@endsection
