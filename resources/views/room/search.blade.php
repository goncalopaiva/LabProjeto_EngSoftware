@extends('layouts.layout')
@section('content')

<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('rooms.index') }}">⬅️ Back to Classrooms</a>
    <!--<a class="btn btn-outline-secondary" href="{{ route('rooms.create') }}">🆕 New Classroom</a>-->
</div>

<br><br>

<form action="{{ route('rooms.search') }}" method="GET" class="form-group col-xs-12 col-sm-12 col-md-12">
    <input type="text" name="search" class="form-control" placeholder="Search Room"/>
    <br>
    <select class="form-control" id="tipo" name="tipo">
            <option value="0"></option>
            <option value="1">Sala</option>
            <option value="2">Laboratório</option>
            <option value="3">Auditório</option>
    </select>
    <br>
    <!--
    <select class="form-control" id="dia_semana" name="dia_semana">
            <option value="0"></option>
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
    </select>
    <br>
    <select class="form-control" id="hora_inicio" name="hora_inicio">
            <option value=""></option>
            <option value="8">8:00</option>
            <option value="9">9:00</option>
            <option value="10">10:00</option>
            <option value="11">11:00</option>
            <option value="12">12:00</option>
            <option value="13">13:00</option>
            <option value="14">14:00</option>
            <option value="15">15:00</option>
            <option value="16">16:00</option>
            <option value="17">17:00</option>
            <option value="18">18:00</option>
            <option value="19">19:00</option>
            <option value="20">20:00</option>
    </select>
    <br> -->
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
    </div>
</form>

<br>

@if($rooms->isNotEmpty())

    <div class="mx-auto">

    <table class="table">
        <tr>
            <th>Sala</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>

    @foreach ($rooms as $room)
    <tr>
        <td>{{ $room->idsala }}</td>
        <td>
            @if ( $room->tipo == 1)
                Sala
            @endif
            @if ( $room->tipo == 2)
                Laboratório
            @endif
            @if ( $room->tipo == 3)
                Auditório
            @endif
        </td>
        <td>
            <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">

                <a class="btn btn-outline-dark" href="{{ route('rooms.show',$room->id) }}">👁 View</a>

                <a class="btn btn-outline-dark" href="{{ route('timetables.show',$room->id) }}">👁 Timetable</a>

                @if (Auth::user()->type == '3')
                        <a class="btn btn-outline-dark" href="{{ route('rooms.edit',$room->id) }}">✏️ Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-dark">❌ Delete</button>
                    @endif
            </form>
        </td>
    </tr>
    @endforeach

    @else
    <tr>
        <td>⛔️  No room found.</td>
    </tr>

    @endif

</table>

</div>


@endsection
