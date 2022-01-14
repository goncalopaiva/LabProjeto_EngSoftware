<!DOCTYPE html>
<html>

<head>
    <title>Timetable - Room {{$room->idsala}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex p-2">
        <img src="https://www.ufp.pt/app/uploads/2019/02/logoufp-300x120.png" alt="Girl in a jacket">
    </div>

    <table class="table table-borderless">
        <tr>
            <th>Room {{$room->idsala}}
            @if ( $room->tipo == 1 )
                (Sala)
            @endif
            @if ( $room->tipo == 2 )
                (Laboratório)
            @endif
            @if ( $room->tipo == 3 )
                (Auditório)
            @endif
            </th>
        </tr>
        <tr>
            <td>Generated on {{$ldate}}</td>
        </tr>
    </table>


    <table class="table table-borderless" style="font-size:12px">
        <tr>
            <th>Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
        </tr>

        @for ($i=8; $i <= 20; $i++)
            <tr>
            <td> {{$i}}:00</td>
            @for ($j=1; $j <= 5; $j++)
                @foreach($timetables as $timetable)
                    @if ($timetable->dia_semana == $j && $timetable->hora_inicio == $i && $timetable->sala == $room->idsala)
                        <td style="background-color:#C6D8FF"></td>
                    @endif
                @endforeach
            @endfor
            </tr>
        @endfor
    </table>
</body>

</html>
