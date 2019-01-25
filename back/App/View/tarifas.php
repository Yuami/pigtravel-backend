<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Session;

    function noHours($date)
    {
        return explode(' ', $date)[0];
    }

    require_once ROOT . "libraries.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="/css/leaflet.css">
    <script src="/js/leaflet.js"></script>
    <title>House</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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

<section class="container-fluid" id="mainHouseSection">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Tarifas</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/houses">House Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tarifas</li>
            </ol>
        </div>
        <div class="container-fluid" id="tarifas">
            <form method="POST" action="/houses/<?= $tarifa->getId() ?>">
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
                                       style="width: 80px;" value="<?= $tarifa->getPrecio(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="peopleAmount">Fecha Inicio</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-2">Fecha Inicio</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span class="fas fa-user text-danger"></span>
                                    </div>
                                </div>
                                <input type="date" class="form-control col-md-8" id="peopleAmount" name="peopleAmount"
                                       style="width: 80px;" value="<?= noHours($tarifa->getFechaInicioRevert()); ?>">
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
                                       style="width: 80px;" value="<?= $tarifa->getFechaFin(); ?>">
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
                                       style="width: 80px;" value="<?= $tarifa->getGeneral(); ?>">
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
                                      name="description"><?php echo $tarifa->getDescripcion(); ?></textarea>
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
    </div>
</section>
<!---->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">Crear</button>-->
<!---->
<!--<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="ModalLabel">Tarifa</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form class="card-body" action="/houses/--><? //= $house->getId() ?><!--/tarifas" method="post">-->
<!--                    <div class="form-group">-->
<!--                        <input type="number" class="form-control" name="idVivienda" id="idVivienda" hidden-->
<!--                               value="--><? //= $house->getId() ?><!--">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="fechaI" class="col-form-label">Fecha Inicio</label>-->
<!--                        <input type="date" class="form-control" name="fechaI" id="fechaI">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="fechaF" class="col-form-label">Fecha Fin</label>-->
<!--                        <input type="date" name="fechaF" id="fechaF" class="form-control">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="precio" class="col-form-label">Precio</label>-->
<!--                        <input type="number" name="precio" id="precio" class="form-control">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <select class="custom-select" name="idPC" id="idPC">-->
<!--                            <option value="0">-- POLITICA CANCELACION --</option>-->
<!--                            --><?php //foreach ($tarifas as $tarifa) { ?>
<!--                                <option value="--><?php //echo $tarifa->getIdPoliticaCancelacion() ?><!--">-->
<!--                                    --><?php //echo $tarifa->getIdPoliticaCancelacion() ?>
<!--                                </option>-->
<!--                            --><?php //} ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="custom-control custom-checkbox" style="margin-left: 28%">-->
<!--                        <input type="checkbox" class="custom-control-input" name="general" id="customCheck1">-->
<!--                        <label class="custom-control-label" for="customCheck1">General</label>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--            <div class="modal-footer row justify-content-center">-->
<!--                <button type="button" id="btnCT" class="btn btn-danger col-4" data-dismiss="modal">Cancelar</button>-->
<!--                <button type="submit" id="btnAT" class="btn btn-success col-4">Confirmar</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<script>-->
<!--    $('#Modal').on('show.bs.modal', function (event) {-->
<!--        var button = $(event.relatedTarget);-->
<!--        var recipient = button.data('whatever');-->
<!--        var modal = $(this);-->
<!--        modal.find('.modal-body input').val(recipient)-->
<!--    })-->
<!--</script>-->
<?php include_once("footer.php") ?>