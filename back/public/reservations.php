<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>Reservations</title>
</head>

<body>
<?php include_once("header.php") ?>
<a href="reserva.php"><h1>RESERVA</h1></a>
<!--  <section>
     <h1>Reservations</h1>
     <div id="cardscasa" class="container">
         <h2>Cards Reserva </h2>
     </div>
 </section> -->
<div class="container col-10">
    <div class="container">
        <h1>Gestio Reservas</h1>
        <h3><u><a href="login.php">Pagina Principal > </a><a href="houselist.php">Cases</a></u></h3>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Estats
            </button>
            <div id="dropEst" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            </div>
        </div>
        
        <div class="align-self-center">
            <table class="table table-striped">
                <tbody id="reservaList">

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once("footer.php") ?>
<script src="js/selects/selectReservasList.js"></script>
<script src="js/selects/selectEstado.js"></script>

</body>

</html>