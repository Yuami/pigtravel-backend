<!DOCTYPE html>
<html lang="en" xmlns:color="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once ROOT . "libraries.php" ?>
    <!-- css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>

    <!-- js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <title>Reservations</title>
</head>

<body>
<?php include_once("header.php") ?>
<div class="container col-10">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Gestio Reservas</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestio Reservas</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-3 form-check-inline">
            <h6 class="col-4">Filtrar por</h6>
            <select id="filterEst" class="form-control">

            </select>
        </div>
        <div class="form-group col-3 form-check-inline">
            <h6 class="col-4">Filtrar por</h6>
            <select id="filterViv" class="form-control">

            </select>
        </div>
        <div class=" col-2">
            <button id="clean" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
        </div>
    </div>
    <table id="taula" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Casa</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Precio</th>
        </tr>
        </thead>
    </table>
</div>
<?php include_once("footer.php") ?>
<script src="js/selects/selectReservasList.js"></script>
<script src="js/selects/selectEstadoFiltro.js"></script>


</body>

</html>