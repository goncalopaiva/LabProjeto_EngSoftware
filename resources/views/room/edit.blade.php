@extends('layouts.layout')

@section('content')
<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('rooms.index') }}">⬅️ Back to Classrooms</a>
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

<form action="{{ route('rooms.update',$room->idsala) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <a>Sala</a>
                <input type="text" name="name" value="{{ $room->idsala }}" class="form-control" placeholder="Sala">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <a>Tipo</a>
                <select class="form-control" value="{{ $room->tipo }}" id="tipo" name="tipo">
                    <option value="1">Sala</option>
                    <option value="2">Laboratório</option>
                    <option value="3">Auditório</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </div>
    </div>

</form>
@endsection
