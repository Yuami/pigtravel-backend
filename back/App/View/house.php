<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Session;

    require_once ROOT . "libraries.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="/css/leaflet.css">
    <script src="/js/leaflet.js"></script>
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
        <form method="POST" action="/houses/<?= $vInfo->getId(); ?>">
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
                                   style="width: 80px;" value="<?= $vInfo->getNombre(); ?>">
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
                                   style="width: 80px;" value="<?= $vInfo->getCapacidad(); ?>">
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
                                   style="width: 80px;" value="<?= $vInfo->getCalle(); ?>">
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
                                   style="width: 80px;" value="<?= $vInfo->getMetrosCuadrados(); ?>">
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
                                   style="width: 80px;" value="<?= $vInfo->getHoraEntrada(); ?>">
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
                                   style="width: 80px;" value="<?= $vInfo->getHoraSalida(); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="sr-only">Description</label>
                        <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Description</h6>

                        <textarea id="description" class="form-control mb-1 col-md-8" rows="4" cols="50"
                                  name="description"><?= $vInfo->getDescripcion(); ?></textarea>
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


    <div class="card">
        <div class="card-title row justify-content-center">
            <h1><?php echo $houses->getNombre() ?></h1>
        </div>
        <div class="card-img-top">
            <div class="row justify-content-center">
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
                            <img src="/img/casas/1.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/casas/2.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/casas/3.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/casas/4.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
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
            </div>
        </div>
        <div class="card-body">
            <div class="dropdown mb-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Politicas Cancelacion
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drop-down-list">
                </div>
            </div>
            <!--            <div class="input-group mb-3 row justify-content-between">-->
            <!--                -->
            <!--                <select class="custom-select col-5" id="selectTarifa">-->
            <!--                    <option value="" selected>Tarifa...</option>-->
            <!--                </select>-->
            <!--                <select class="custom-select col-5" id="selectRebaja">-->
            <!--                    <option value="" selected>Rebaja...</option>-->
            <!--                </select>-->
            <!--            </div>-->
            <!--            <table class="table table-striped table-responsive" id="listadoTarifas">-->
            <!--                <thead>-->
            <!--                <tr>-->
            <!--                    <th>ID</th>-->
            <!--                    <th>Fecha Inicio</th>-->
            <!--                    <th>Fecha Fin</th>-->
            <!--                    <th>Precio</th>-->
            <!--                    <th>General</th>-->
            <!--                    <th>Politica Cancelacion</th>-->
            <!--                </tr>-->
            <!--                </thead>-->
            <!--            </table>-->
            <!--            <div class="container">-->
            <!--                <ul class="list-group mb-3" id="list-group-tarifa"></ul>-->
            <!--                <ul class="list-group mb-3" id="list-group-rebaja"></ul>-->
            <!--                <ul class="list-group mb-3" id="list-group-vivienda-tarifa"></ul>-->
            <!--                <h2>Politicas Cancelacion</h2>-->
            <!--                <div class="row">-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="list-group" id="list-group-politica-cancelacion" role="tablist"></div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-8">-->
            <!--                        <div class="tab-content" id="nav-tabContent"></div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->


            <button type="button" id="myBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Crear Tarifa
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear Tarifa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
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
                                <div class="form-group row justify-content-center">
                                    <input type="checkbox" name="general" id="general" class="form-control">
                                    <label for="general" class="form-check-label">General</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Crear Tarifa</button>
                        </div>
                    </div>
                </div>
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
        let idCiudadVivienda = <?= $vInfo->getIdCiudad(); ?>;
        loadLocalidades(idCiudadVivienda);
        mapLoad(<?php echo $vInfo->getCoordX() . "," . $vInfo->getCoordY(); ?>);
    });
</script>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectTarifa-Rebaja.js"