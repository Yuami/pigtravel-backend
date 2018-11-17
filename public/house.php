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
    <title>House</title>
</head>

<body>
<?php include_once("header.php") ?>

<section class="container">
    <h1>House</h1>
    <div class="input-group mb-3">
        <select class="custom-select" id="selectTarifa">
            <option value="" selected>Tarifa...</option>
        </select>
        <select class="custom-select" id="selectRebaja">
            <option value="" selected>Rebaja...</option>
        </select>
    </div>

    <table class="table table-striped" id="listadoTarifas">
        <thead>
        <tr>
            <th>ID</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Precio</th>
            <th>General</th>
            <th>Politica Cancelacion</th>
        </tr>
        </thead>
    </table>
    <div class="container">

        <ul class="list-group mb-5" id="list-group-tarifa"></ul>
        <ul class="list-group mb-5" id="list-group-vivienda-tarifa"></ul>
        <h2>Politicas Cancelacion</h2>
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-group-politica-cancelacion" role="tablist"></div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent"></div>
            </div>
        </div>
    </div>
</section>


<?php include_once("footer.php") ?>
<script src="js/selects/selectTarifa-Rebaja.js"></script>
<script src="js/selects/selectVivienda-Tarifa.js"></script>
<script src="js/selects/selectPoliticaCancelacion.js"></script>
</body>
</html>