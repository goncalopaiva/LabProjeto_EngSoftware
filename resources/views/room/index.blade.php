@extends('layouts.layout')

@section('content')

<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('home') }}">🏠 Home</a>
    <a class="btn btn-outline-secondary" href="{{ route('rooms.create') }}">🆕 New Classroom</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br>

<div class="mx-auto">

    <table class="table" syle="width: 30%">
        <tr>
            <th>Sala</th>
            <th>Tipo</th>
            <th style="20 px">Ações</th>
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

                    <a class="btn btn-outline-dark" href="{{ route('rooms.edit',$room->id) }}">✏️ Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-dark">❌ Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection
