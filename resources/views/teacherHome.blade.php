@extends('layouts.layout')

@section('content')

<div class="d-flex p-2">
    <img src="https://www.ufp.pt/app/uploads/2019/02/logoufp-300x120.png" alt="Girl in a jacket">
</div>

<br>

<p class="ml-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
    Ipsum porro nulla dignissimos doloribus, obcaecati quisquam pariatur ex
    incidunt assumenda laborum temporibus sapiente, aperiam placeat mollitia esse
    amet exercitationem impedit ad?</p>

<br>

<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">🎓 Classrooms</h5>
                <p class="card-text">Manage classroom data.</p>
                <a href="/rooms" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">🧔🏻‍♂️ Users</h5>
                <p class="card-text">Manage user data</p>
                <a href="/users" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>

</div>
<!--
<div class="row mt-3">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">📅 Timetable</h5>
                <p class="card-text">View timetable</p>
                <a href="/timetables" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>

</div>
--->

@endsection
