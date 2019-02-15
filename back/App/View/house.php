<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Session;
    use Model\DAO\CitiesDAO;

    function noHours($date)
    {
        return explode(" ", $date)[0];
    }

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
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#mainHouseSection">House</a></li>
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#tarifas">Rates</a></li>
        <li class="nav-item text-center col-6 col-sm-3"><a class="nav-link" href="#politicas">Policies</a></li>
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
    <div class="container" id="house">
        <form method="POST" action="/houses/<?= $houses->getId() ?>">
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
    <div id="tarifas"></div>
    <hr>
    <div class="row">
        <div class="row col-12 justify-content-center">
            <h2 class="text-center m-5">TARIFAS</h2>
        </div>
        <div class="row col-12 justify-content-center my-5">
            <button type="button" class="btn btn-primary col-md-4 col-12" data-toggle="modal" data-target="#ModalT">
                Crear
                Tarifa
            </button>
        </div>
        <div class="row col-12 justify-content-center">
            <?php if (!empty($tarifas)) {
            foreach ($tarifas

            as $tarifa) { ?>
            <?php if ($tarifa->getGeneral() == 0) { ?>
            <div class="card text-center shadow col-md-3 col-12 m-2">
                <a href="/tarifas/<?php echo $tarifa->getId() ?>" style="text-decoration: none; color:inherit">
                    <div class="card-body">
                        <h4 class="card-title">Tarifa</h4>
                        <p class="card-text">
                            <span class="fas fa-dollar-sign"></span> <?php echo $tarifa->getPrecio() ?></p>
                        <p class="card-text">
                            <span class="fas fa-arrow-alt-circle-right"></span>
                            <?php echo noHours($tarifa->getFechaInicio()) ?></p>
                        <p class="card-text">
                            <span class="fas fa-arrow-alt-circle-left"></span>
                            <?php echo noHours($tarifa->getFechaFin()) ?></p>
                        <?php foreach ($politicas as $politica) { ?>
                            <?php if ($politica->getId() == $tarifa->getIdPoliticaCancelacion()) { ?>
                                <p class="card-text">
                                    <span class="fas fa-arrow-alt-circle-left"></span>
                                    <?= $politica->getNombre() ?></p>
                            <?php }
                        }
                        } else { ?>
                        <div class="card text-center bg-warning shadow col-md-3 col-12 m-2">
                            <a href="/tarifas/<?php echo $tarifa->getId() ?>"
                               style="text-decoration: none;color:inherit">
                                <div class="card-body">
                                    <h4 class="card-title ">
                                        <storng>Tarifa</storng>
                                    </h4>
                                    <h4 class="card-title mt-4">
                                        <storng>General</storng>
                                    </h4>
                                    <p class="card-text mt-4">
                                        <span class="fas fa-dollar-sign"></span> <?php echo $tarifa->getPrecio() ?>
                                    </p>
                                    <p class="card-text mt-4 mb-2">
                                        <?php foreach ($politicas as $politica) { ?>
                                            <?php if ($politica->getId() == $tarifa->getIdPoliticaCancelacion()) { ?>
                                                <span class="fas fa-arrow-alt-circle-left"></span>
                                                <?= $politica->getNombre() ?>
                                            <?php } ?>
                                        <?php } ?></p>
                                    <?php } ?>
                                </div>
                            </a>
                            <div class="card-footer" id="footerP">
                                <form action="/tarifas/<?php echo $tarifa->getId() ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="idT" id="idT"
                                           value="<?php echo $tarifa->getId() ?>">
                                    <button type="submit" id="btnET" class="btn btn-danger">Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php }
                        } ?>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="politicas">
        <div class="row justify-content-center col-12">
            <h2 class="text-center m-5">POLITICAS DE CANCELACION</h2>
        </div>
        <div class="row justify-content-center col-12 my-5">
            <button type="button" class="btn btn-primary col-md-4 col-12" data-toggle="modal" data-target="#ModalP">
                Crear
                Politica
            </button>
        </div>
        <div class="row justify-content-center col-12 my-5">
<!--            --><?php //if (!empty($politicas)) {
//            foreach ($politicas as $politica) {
//            $linias = $politica->getLinias() ?>
<!--            <a href="/politicas/--><?php //echo $politica->getId() ?><!--" style="text-decoration: none; color:inherit">-->
<!--                <div class="card text-center shadow col-md-3 col-12 m-2">-->
<!--                    <div class="card-header">-->
<!--                        <h4 class="card-title">Politica de --><?//= $politica->getNombre() ?><!--</h4>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        --><?php //foreach ($linias as $item) { ?>
<!--                            <p class="card-text"><i class="fas fa-sun"></i> --><?//= $item->getDias() ?><!-- Dias-->
<!--                                <br>--><?//= $item->getPorcentaje() ?><!-- <i class="fas fa-percentage"></i></p>-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--            </a>-->
<!--            <div class="card-footer" id="footerP">-->
<!--                <form action="/politicas/--><?php //echo $politica->getId() ?><!--" method="post">-->
<!--                    <input type="hidden" name="_method" value="DELETE">-->
<!--                    <input type="hidden" name="idH" id="idH" value="--><?php //echo $houses->getId() ?><!--">-->
<!--                    <button type="submit" id="btnET" class="btn btn-danger">Eliminar-->
<!--                    </button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        --><?php //}
//        } ?>
<!--    </div>-->
<!--    <div class="modal fade" id="ModalT" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"-->
<!--         aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="ModalLabel">Tarifa</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <form class="card-body" action="/houses/--><?php //echo $houses->getId() ?><!--" method="post">-->
<!--                        <div class="form-group">-->
<!--                            <label for="fechaI" class="col-form-label">Fecha Inicio</label>-->
<!--                            <input type="date" class="form-control" name="fechaI" id="fechaI">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="fechaF" class="col-form-label">Fecha Fin</label>-->
<!--                            <input type="date" name="fechaF" id="fechaF" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="precio" class="col-form-label">Precio</label>-->
<!--                            <input type="number" name="precio" id="precio" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <select class="custom-select" name="idPC" id="idPC">-->
<!--                                <option value="0">-- POLITICA CANCELACION --</option>-->
<!--                                --><?php //foreach ($politicas as $politica) { ?>
<!--                                    <option value="--><?php //echo($politica->getId()) ?><!--">-->
<!--                                        --><?php //echo $politica->getNombre() ?>
<!--                                    </option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                        --><?php //if ($tarifa->getGeneral() == 1) { ?>
<!--                            <div class="custom-control custom-checkbox" style="margin-left: 40%">-->
<!--                                <input type="checkbox" class="custom-control-input" name="general"-->
<!--                                       id="customCheck1">-->
<!--                                <label class="custom-control-label" for="customCheck1">General</label>-->
<!--                            </div>-->
<!--                        --><?php //} else { ?>
<!--                            <div class="custom-control custom-checkbox" style="margin-left: 40%">-->
<!--                                <input type="checkbox" class="custom-control-input" name="general"-->
<!--                                       id="customCheck1" disabled>-->
<!--                                <label class="custom-control-label" for="customCheck1">General</label>-->
<!--                            </div>-->
<!--                        --><?php //} ?>
<!--                        <div class="row justify-content-between m-2">-->
<!--                            <button type="button" id="btnCT" class="btn btn-danger col-4 offset-1"-->
<!--                                    data-dismiss="modal"> Cancelar-->
<!--                            </button>-->
<!--                            <button type="submit" id="btnAT" class="btn btn-success col-md-4 col-12 mr-5">-->
<!--                                Confirmar-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="modal fade" id="ModalP" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"-->
<!--         aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="ModalLabel">Politica de Cancelacion</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <form class="card-body" action="/politicas/--><?php //echo $politica->getId() ?><!--" method="post">-->
<!--                        <input type="hidden" name="idV" value="--><?php //echo $houses->getIdVendedor() ?><!--">-->
<!--                        <input type="hidden" name="idH" value="--><?php //echo $houses->getId() ?><!--">-->
<!--                        <div class="form-group">-->
<!--                            <label for="nombre" class="col-form-label">Nombre</label>-->
<!--                            <input type="text" class="form-control" name="nombre" id="nombre">-->
<!--                        </div>-->
<!--                        <hr>-->
<!--                        <h5 class="text-center">Crea tu primera Linia de la Politica</h5>-->
<!--                        <div class="form-group">-->
<!--                            <label for="dias" class="col-form-label">Dias</label>-->
<!--                            <input type="number" name="dias" id="dias" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="porcentaje" class="col-form-label">Porcentaje</label>-->
<!--                            <input type="number" name="porcentaje" id="porcentaje" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="row justify-content-between m-2">-->
<!--                            <button type="button" id="btnCT" class="btn btn-danger col-4 offset-1"-->
<!--                                    data-dismiss="modal"> Cancelar-->
<!--                            </button>-->
<!--                            <button type="submit" id="btnAT" class="btn btn-success col-4 mr-5">Confirmar-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</section>
<script src="/js/calendar.js"></script>
<script src="/js/custom/house.js"></script>
<script src="/js/custom/loadLocalidades.js"></script>
<script>
    $('#ModalT').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('');
        var modal = $(this);
        modal.find('.modal-body input').val(recipient)
    });
     $('#footerC').on('click')
    $(function () {
        mapLoad(<?php echo $houses->getCoordX() . "," . $houses->getCoordY(); ?>);
        let idRegion = <?= \Model\DAO\CitiesDAO::getById($houses->getIdCiudad())->getRegionId(); ?>;
        loadCiudades(idRegion);
        $('#city').select2.val(<?= $houses->getIdCiudad() ?>).trigger('change.select2');
    });
</script>
<?php include_once CALENDAR ?>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectTarifa-Rebaja.js"/>