
<!DOCTYPE html>
<html>

<head>
    <title>Reservation for room {{ $event->sala }}</title>
</head>

<body class="bg-light">
  <div class="container">
    <img class="logo" src="https://www.ufp.pt/app/uploads/2019/02/logoufp-300x120.png" />
    <div class="container">

        <br>

        Hello, {{ Auth::user()->name }}.

        <br>

        The reservation made for

        @if ($event->dia_semana == 1)
            segunda-feira
        @endif

        @if ($event->dia_semana == 2)
            terça-feira
        @endif

        @if ($event->dia_semana == 3)
            quarta-feira
        @endif

        @if ($event->dia_semana == 4)
            quinta-feira
        @endif

        @if ($event->dia_semana == 5)
            sexta-feira
        @endif

        at {{ $event->hora_inicio }} for room {{ $event->sala }} was confirmed.

        <br>

        Thank you!

    </div>
  </div>
</body>


</html>


