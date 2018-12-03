<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once("libraries.php") ?>
    <title>House</title>
</head>

<body class="bg-color-background">
<?php include_once("header.php") ?>

<section class="container">
    <h1>House</h1>

    <div id="carouselCasas" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#carouselCasas" data-slide-to="0" class="active"></li>
            <li data-target="#carouselCasas" data-slide-to="1"></li>
            <li data-target="#carouselCasas" data-slide-to="2"></li>
            <li data-target="#carouselCasas" data-slide-to="3"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/casas/house1.jpg" alt="Los Angeles House">
            </div>
            <div class="carousel-item">
                <img src="img/casas/house2.jpg" alt="Los Angeles House">
            </div>
            <div class="carousel-item">
                <img src="img/casas/house3.jpg" alt="Los Angeles House">
            </div>
            <div class="carousel-item">
                <img src="img/casas/house4.jpg" alt="Los Angeles House">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carouselCasas" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselCasas" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>

    <div class="dropdown mb-3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Politicas Cancelacion
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drop-down-list">
        </div>
    </div>

    <div class="input-group mb-3">
        <select class="custom-select" id="selectTarifa">
            <option value="" selected>Tarifa...</option>
        </select>
        <select class="custom-select" id="selectRebaja">
            <option value="" selected>Rebaja...</option>
        </select>
    </div>

    <table class="table table-striped table-responsive" id="listadoTarifas">
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
        <ul class="list-group mb-3" id="list-group-tarifa"></ul>
        <ul class="list-group mb-3" id="list-group-rebaja"></ul>
        <ul class="list-group mb-3" id="list-group-vivienda-tarifa"></ul>
        <h2>Politicas Cancelacion</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="list-group" id="list-group-politica-cancelacion" role="tablist"></div>
            </div>
            <div class="col-md-8">
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
