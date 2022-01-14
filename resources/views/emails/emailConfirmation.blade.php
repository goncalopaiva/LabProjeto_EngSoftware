
<!DOCTYPE html>
<html>

<head>
    <title>Reservation for room</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body class="bg-light">
  <div class="container">
    <img class="ax-center my-10 w-24" src="https://www.ufp.pt/app/uploads/2019/02/logoufp-300x120.png" />
    <div class="card p-6 p-lg-10 space-y-4">
      <p>
          Room reservation for room {{$request->dia_semana}} at {{$request->hora_inicio}}:00 is confirmed.
      </p>
      <br>
      <p>
          Thank you!
     </p>
    </div>
    <img class="ax-center mt-10 w-40" src="https://assets.bootstrapemail.com/logos/light/text.png" />
  </div>
</body>


</html>


