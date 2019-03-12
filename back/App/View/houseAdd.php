<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    require_once ROOT . "libraries.php" ?>

    <link rel="stylesheet" href="/css/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"/>
    <link href="/css/select2.min.css" rel="stylesheet"/>

    <script src="/js/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="/js/validation/bootstrap-validator.js"></script>
    <script src="/js/selects/select2.min.js"></script>
    <title>Add house</title>
</head>

<body>
<?php include_once("header.php") ?>

<section class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Add House</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/houses.php">Houses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Houses</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        <form id="addHouseForm" method="POST" action="/houses" enctype="multipart/form-data">
                        <input id="lon" type="hidden" name="lon">
                        <input id="lan" type="hidden" name="lan">

            <div class="row px-md-5">
                <div class="col-md-8 col-12">
                    <div id="leftHouseForm" class="tab form-group">
                        <h3 class="text-center">Informacion General</h3>
                        <label for="houseName">Nombre de la vivienda</label>
                        <input type="text" id="houseName" class="form-control mb-1"
                               name="houseName">
                        <label for="peopleAmount">Capacidad</label>
                        <input type="number" id="peopleAmount" class="form-control mb-1"
                               name="peopleAmount">
                    </div>
                    <div class="tab form-group">
                        <h1 class="text-center">Informacion Adicional</h1>
                        <label for="tipoVivienda">Tipo de vivienda</label><br/>
                        <select name="tipoVivienda" class="form-control mb-1">
                                <?php foreach ($tipoVivienda as $tipo) { ?>
                                    <option value="<?= $tipo->getIdTipoVivienda()?>"><?= $tipo->getNombre() ?></option>
                               <?php } ?>
                            </select>
                        <label for="squaremeters">Metros Cuadrados</label>
                        <input type="number" class="form-control mb-1" name="squaremeters">
                        <label for="checkIn">Hora del Check In</label>
                        <input type="time" class="form-control mb-1" name="checkIn" value="14:00">
                        <label for="checkOut">Hora del Check Out</label>
                        <input type="time" class="form-control mb-1" name="checkOut" value="12:00">
                        <label for="description">Descripcion</label>
                        <textarea id="description" class="form-control mb-1" rows="4" cols="50"
                                  name="description"></textarea>
                    </div>
                    <div class="tab">
                        <div id="loading" class="d-none">
                            <div class="loading-image">
                                <img id="loading-image" src="/img/loading.gif" alt="Loading..."/>
                                <p id="loading-message"></p>
                            </div>
                        </div>

                        <h1 class="text-center">Alquiler y localidad</h1>

                        <label for="standardRate">Alquiler automatico</label>
                        <input type="checkbox" class="form-control mb-1" name="alquilerAutomatico">
                        <label for="country">Pais</label>
                        <select id="country" class="form-control" name="country" style="width: 100% !important;">
                        </select>
                        <label for="region">Region</label>
                        <select id="region" class="form-control" name="region" style="width: 100% !important;">
                        </select>
                        <label for="city">Ciudad</label>
                        <select id="city" class="form-control" name="city" style="width: 100% !important;">
                        </select>
                        <label for="street">Calle</label>
                        <input id="street" type="text" class="form-control mb-1"
                               name="street">
                        <div id="wrongHouseLocationDiv" class="custom-control custom-checkbox d-none">
                            <input type="checkbox" class="custom-control-input" id="wrongHouseLocation">
                            <label class="custom-control-label text-danger" for="wrongHouseLocation">Change house
                                location on map!</label>
                        </div>
                    </div>
                    <div id="imageTab" class="tab">
                        <h1 class="text-center">Imagenes</h1>
                        <input type="file" name="picture[]" multiple class="form-control">
                    </div>

            <!-- ---------- Servicios ---------- -->

            <div class="tab">
                <h1 class="text-center">Servicios</h1>
                <div class="row">
                    <?php foreach ($servicios as $servicio) {
                        if (!$servicio instanceof \Model\Items\ServicioHasIdioma) continue;
                        ?>
                        <div class="custom-control custom-checkbox col-md-6 col-lg-4 col-12">
                            <input type="checkbox" class="custom-control-input"
                                   id="customCheck<?= $servicio->getIdServicio() ?>" name="servicios[]"
                                   value="<?= $servicio->getIdServicio() ?>">
                            <label class="custom-control-label"
                                   for="customCheck<?= $servicio->getIdServicio() ?>"><?= $servicio->getNombre() ?></label>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>


                    <div style="overflow:auto;">
                        <div style="float: left;margin:10px auto 30px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 card">
                    <div class="row">
                        <div class="card-header w-100"><h3 id="houseNameCard" class="text-center mb-0">Tu Casa</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="houseMap" style="width:auto;height:300px;margin: -36px -36px 0;"></div>
                        <p id="personCard" class="mb-0"></p>
                        <p id="streetCard"></p>
                        <p id="descriptionCard" class="card-text"></p>
                    </div>
                </div>
        </form>
    </div>
</section>

<!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDufJRsYwR2Knzo2rmeamYxCTpdyeAkhl4&callback=initMap">
</script> -->
<script src="/js/custom/loadLocalidades.js"></script>
<script src="/js/custom/houseAdd.js"></script>
<script>
    $(function () {
        loadPaises();
        loadRegion(country.select2('val'));

    });
</script>
<?php
include_once("footer.php") ?>
</body>
</html>