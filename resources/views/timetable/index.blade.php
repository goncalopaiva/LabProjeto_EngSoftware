@extends('layouts.layout')

@section('content')

<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('rooms.index') }}">⬅️ Back to Classrooms</a>
    <a class="btn btn-outline-secondary" href="{{ route('timetables.create', $room) }}">🆕 New Appointment</a>
    <a class="btn btn-outline-secondary" href="{{ route('timetables.createPDF',$room->id)  }}">🖨 Print</a>
    <!--<a class="btn btn-outline-secondary" href="{{ route('rooms.create') }}">🆕 New Classroom</a>-->
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br>

<div class="mt-4">

    @yield('timetable')

</div>


@endsection

