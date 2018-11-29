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

    <!-- css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>

    <!-- js -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <title>Reservations</title>
</head>

<body>
<?php include_once("header.php") ?>
<a href="reserva.php"><h1>RESERVA</h1></a>
<div class="container col-10">
    <div class="row">
        <div class="col">
            <table id="taula" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Clientes</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php //include_once("footer.php") ?>
<script src="js/selects/selectReservasList.js"></script>


</body>

</html>