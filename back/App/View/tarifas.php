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
    </div>
</section>
<section class="container">
    <div class="row justify-content-center mb-2">
        <div class="card col-md-6 col-11 shadow">
            <div class="card-header">
                <h5 class="card-title text-center">Tarifa</h5>
            </div>
            <div class="card-body">
                <form action="/tarifas/<?= $tarifa->getId() ?>" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="col-form-label" for="fechaI">Fecha Inicio</label>
                        <input class="form-control" type="date" name="fechaI" id="fechaI"
                               value="<?= noHours($tarifa->getFechaInicio()) ?>"
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="fechaF">Fecha Fin</label>
                        <input class="form-control" type="date" id="fechaF" name="fechaF"
                               value="<?= noHours($tarifa->getFechaFin()) ?>"
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="precio">Precio</label>
                        <input class="form-control" type="number" id="precio" name="precio"
                               value="<?= $tarifa->getPrecio() ?>"
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="idPC" id="idPC">
                            <option value="0"><?= $tarifa->getIdPoliticaCancelacion() ?></option>
                        </select>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="custom-control custom-checkbox col-md-2 col-4">
                            <input type="checkbox" class="custom-control-input" name="general"
                                   id="general">
                            <label class="custom-control-label" for="general">General</label>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mt-4">
                        <button type="submit" id="btnAT" class="btn btn-success col-4">Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<?php include_once("footer.php") ?>
<div class="row">


