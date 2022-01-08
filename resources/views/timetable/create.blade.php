@extends('layouts.layout')

@section('content')
<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('timetables.show', $room->id) }}">⬅️ Back to Timetable</a>
    <!--<a class="btn btn-outline-secondary" href="{{ route('rooms.create') }}">🆕 New Classroom</a>-->
</div>

<br><br>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<form action="{{ route('timetables.store') }}" method="POST">
    @csrf

    <div class="col-xs-12 col-sm-12 col-md-12">
        Creating an appointment for Classroom {{ $room->idsala }}
    </div>

    <div class="d-none">
        <input name="sala" value="{{$room->idsala}}">
    </div>

    <br>

    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <select class="form-control" id="exampleFormControlSelect1" name="dia_semana">
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
        </select>
    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <select class="form-control" id="exampleFormControlSelect1" name="hora_inicio">
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
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
    </div>


</form>
@endsection
