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
                    <form class="row m-5">

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
<!--                <form class="card-body" action="/houses/--><?//= $house->getId() ?><!--/tarifas" method="post">-->
<!--                    <div class="form-group">-->
<!--                        <input type="number" class="form-control" name="idVivienda" id="idVivienda" hidden-->
<!--                               value="--><?//= $house->getId() ?><!--">-->
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