@extends('layouts.layout')

@section('content')

<div class="float-right mb-4">
    <a class="btn btn-outline-secondary" href="{{ route('home') }}">🏠 Home</a>
    <a class="btn btn-outline-secondary" href="{{ route('users.create') }}">🆕 New User</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br>

<div class="mx-auto">

    <table class="table" syle="">
        <tr>
            <th>Name</th>
            <!--<th>Email</th>-->
            <th>Type</th>
            <th>Ações</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <!--<td>{{ $user->email }}</td>-->
            <td>
            @if ( $user->type == 1)
                    Student
                @endif
                @if ( $user->type == 2)
                    Teacher
                @endif
                @if ( $user->type == 3)
                    Staff
                @endif

            </td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                    <a class="btn btn-outline-dark" href="{{ route('users.show',$user->id) }}">👁 View</a>

                    <!--<a class="btn btn-outline-dark" href="{{ route('users.edit',$user->id) }}">✏️ Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-dark">❌ Delete</button> -->
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>



@endsection
