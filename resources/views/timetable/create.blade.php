@extends('layouts.layout')

@section('content')
<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('timetables.index') }}">⬅️ Back to Timetable</a>
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

    <div class="">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="idsala" class="form-control" placeholder="Número Sala">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="tipo" class="form-control" placeholder="Hora">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </div>
    </div>

</form>
@endsection
