<h3>
    <small class="text-muted">Room Timetable</small>
</h3>

<table class="table" style="font-size:12px">

    <tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
    </tr>

    <?php
    $time = array ("08:00", "08:30", "09:00", "09:30",
                "10:00", "10:30", "11:00", "11:30",
                "12:00", "12:30", "13:00", "13:30",
                "14:00", "14:30", "15:00", "15:30",
                "16:00", "16:30", "17:00", "17:30",
                "18:00", "18:30", "19:00", "19:30",
                "20:00"
            );

    for ($i=1; $i<sizeof($time); $i++) {
        echo "<tr>" ;
            echo "<th>";
                echo $time[$i-1] . " - " . $time[$i];
            echo "</th>";
        echo "</tr>" ;
    }

    ?>


</table>
