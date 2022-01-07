@extends('layouts.layout')
@section('content')

<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">⬅️ Back to Users</a>
    <!--<a class="btn btn-outline-secondary" href="{{ route('rooms.create') }}">🆕 New Classroom</a>-->
</div>

<br><br>

<div class="">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            @if ( $user->type == 1)
                    Student
                @endif
                @if ( $user->type == 2)
                    Teacher
                @endif
                @if ( $user->type == 3)
                    Staff
                @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
</div>


@endsection
