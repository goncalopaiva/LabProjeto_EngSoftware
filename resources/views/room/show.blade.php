@extends('layouts.layout')
@section('content')

<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('rooms.index') }}">⬅️ Back to Classrooms</a>
    <!--<a class="btn btn-outline-secondary" href="{{ route('rooms.create') }}">🆕 New Classroom</a>-->
</div>

<br><br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sala:</strong>
            {{ $room->idsala }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo:</strong>
            @if ( $room->tipo == 1)
                    Sala
                @endif
                @if ( $room->tipo == 2)
                    Laboratório
                @endif
                @if ( $room->tipo == 3)
                    Auditório
                @endif
        </div>
    </div>
</div>


@endsection
