@extends('layouts.layout')

@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br><br>

<div class="mx-auto">
    <h4>Students</h4>
    <table class="table" syle="">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            @if ($user->type == 1)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-outline-dark" href="{{ route('users.show',$user->id) }}">👁 View</a>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>

<br><br>

<div class="mx-auto">
    <h4>Teachers</h4>
    <table class="table" syle="">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            @if ($user->type == 2)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-outline-dark" href="{{ route('users.show',$user->id) }}">👁 View</a>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>

<br><br>

<div class="mx-auto">
    <h4>Staff</h4>
    <table class="table" syle="">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            @if ($user->type == 3)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-outline-dark" href="{{ route('users.show',$user->id) }}">👁 View</a>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>

@endsection
