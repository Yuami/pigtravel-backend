<!DOCTYPE html>
<html lang="en" xmlns:color="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once ROOT . "libraries.php" ?>
    <script src="/js/jquery.dataTables.js"></script>
    <title>Reservations</title>
</head>

<body>
<?php include_once("header.php") ?>
<div class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Gestio Reservas</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestio Reservas</li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="row col-10">
            <div class="form-group col-3 form-check-inline">
                <h6 class="col-4">Filtrar por</h6>
                <select id="filterEst" class="form-control">
                    <option value="" selected="selected">--- Estado ---</option>
                </select>
            </div>
            <div class="form-group col-3 form-check-inline">
                <h6 class="col-4">Filtrar por</h6>
                <select id="filterViv" class="form-control">
                    <option value="0" selected="selected">--- Casa ---</option>
                </select>
            </div>
            <div class="col-2">
                <button id="clean" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
            </div>
        </div>
        <table id="taula" class="table table-striped table-bordered col-10">
            <thead>
            <tr>
                <th>Casa</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Precio</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($reservas as $reserva) { ?>
                <tr>
                    <td><?php echo $reserva->getVivienda()->getNombre() ?></td>
                    <td><?php echo $reserva->getVendedor()->getNombre() ?></td>
                    <td><?php echo $reserva->getNombreEstado() ?></td>
                    <td><?php echo $reserva->getFechaReserva() ?></td>
                    <td><?php echo $reserva->getPrecio() ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once("footer.php") ?>
<!--<script src="js/selects/selectEstadoFiltro.js"></script>-->


</body>

</html>