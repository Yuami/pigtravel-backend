<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Session;
    use Model\DAO\CitiesDAO;

    require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="/css/leaflet.css">
    <link href="/css/select2.min.css" rel="stylesheet"/>

    <script src="/js/popper.min.js"></script>
    <script src="/js/leaflet.js"></script>
    <script src="/js/selects/select2.min.js"></script>

    <title>House</title>
</head>
<body class="bg-color-background">

<?php include_once("header.php"); ?>

<nav class="navbar navbar-expand-lg navbar-dark" id="scrollspy">
    <ul class="nav nav-pills mr-auto ml-auto">
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#section1">House</a></li>
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#section2">Rates</a></li>
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#section3">Policies</a></li>
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#">Show</a></li>
    </ul>
</nav>

<?php
if (Session::isSet("updateCompleted")) {
    Session::delete("updateCompleted"); ?>
    <div id="updateCompleted" class="alert alert-success" role="alert">
        House successfully updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<section class="container-fluid" id="mainHouseSection">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>House</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/houses">House Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">House</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <form method="POST" action="/houses/<?= $houses->getId(); ?>">
            <input type="hidden" name="_method" value="PUT">

            <div class="row">
                <div class="col-md-6 ">
                    <h2 class="text-center">Information</h2>
                    <div class="row">
                        <label class="sr-only" for="firstNameForm">House Name</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">House Name</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-home text-danger"></span>
                                </div>
                            </div>
                            <input type="text" class="form-control col-md-8" id="houseName" name="houseName"
                                   style="width: 80px;" value="<?= $houses->getNombre(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="peopleAmount">Capacity</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Capacity</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-user text-danger"></span>
                                </div>
                            </div>
                            <input type="number" class="form-control col-md-8" id="peopleAmount" name="peopleAmount"
                                   style="width: 80px;" value="<?= $houses->getCapacidad(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="street">Street</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Street</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-road text-danger"></span>
                                </div>
                            </div>
                            <input type="text" class="form-control col-md-8" id="street" name="street"
                                   style="width: 80px;" value="<?= $houses->getCalle(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="city">City</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">City</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-city text-danger"></span>
                                </div>
                            </div>
                            <select id="city" class="form-control col-md-8" name="city">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="squaremeters">Square meters</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Square meters</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-arrows-alt-h text-danger"></span>
                                </div>
                            </div>
                            <input type="text" class="form-control col-md-8" id="squaremeters" name="squaremeters"
                                   style="width: 80px;" value="<?= $houses->getMetrosCuadrados(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="checkIn">Check In</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Check In</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-lock-open text-danger"></span>
                                </div>
                            </div>
                            <input type="time" class="form-control col-md-8" id="checkIn" name="checkIn"
                                   style="width: 80px;" value="<?= $houses->getHoraEntrada(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="checkOut">Check Out</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Check Out</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-lock text-danger"></span>
                                </div>
                            </div>
                            <input type="time" class="form-control col-md-8" id="checkOut" name="checkOut"
                                   style="width: 80px;" value="<?= $houses->getHoraSalida(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="sr-only">Description</label>
                        <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Description</h6>

                        <textarea id="description" class="form-control mb-1 col-md-8" rows="4" cols="50"
                                  name="description"><?= $houses->getDescripcion(); ?></textarea>
                        <input class="btn btn-block btn-primary mt-3" type="submit"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-center">Map</h2>
                    <div id="houseMap" style="width:auto;height:300px;"></div>
                </div>
            </div>

        </form>
    </div>

    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="card">
                <form class="card-body bg-main">
                    <div class="form-group">
                        <label for="fechaI" class="col-form-label">Fecha Inicio</label>
                        <input type="date" class="form-control" id="fechaI">
                    </div>
                    <div class="form-group">
                        <label for="fechaF" class="col-form-label">Fecha Fin</label>
                        <input type="date" name="fechaF" id="fechaF" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control">
                    </div>
                    <div class="form-check" style="margin-left: 28%;">
                        <input type="checkbox" name="general" id="general" class="form-check-input">
                        <label for="general" class="form-check-label">General</label>
                    </div>
                    <div class="btn-group-toggle" style="margin-left: 15%">
                        <button type="button" id="btnCT" class="btn btn-danger">Cancelar</button>
                        <button type="submit" id="btnAT" class="btn btn-success">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "inline";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script src="/js/custom/house.js"></script>
<script src="/js/custom/loadLocalidades.js"></script>
<script>
    $(function () {
        mapLoad(<?php echo $houses->getCoordX() . "," . $houses->getCoordY(); ?>);
        let idRegion = <?= \Model\DAO\CitiesDAO::getById($houses->getIdCiudad())->getRegionId(); ?>;
        loadCiudades(idRegion);
        $('#city').select2.val(<?= $houses->getIdCiudad() ?>).trigger('change.select2');
    });
</script>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectTarifa-Rebaja.js"