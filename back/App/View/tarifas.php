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
            <h1>House</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/houses">House Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tarifas</li>
            </ol>
        </div>
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="card">
                    <form class="card-body bg-main" action="/houses/<?= $house->getId() ?>/tarifas"
                          method="post">
                        <div class="form-group">
                            <input type="number" class="form-control" name="idVivienda" id="idVivienda" hidden
                                   value="<?= $house->getId() ?>">
                        </div>
                        <div class="form-group">
                            <label for="fechaI" class="col-form-label">Fecha Inicio</label>
                            <input type="date" class="form-control" name="fechaI" id="fechaI">
                        </div>
                        <div class="form-group">
                            <label for="fechaF" class="col-form-label">Fecha Fin</label>
                            <input type="date" name="fechaF" id="fechaF" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="precio" class="col-form-label">Precio</label>
                            <input type="number" name="precio" id="precio" class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="idPC" id="idPC">
                                <option value="0">-- POLITICA CANCELACION --</option>
                                <?php foreach ($tarifas as $tarifa) { ?>
                                    <option value="<?php echo $tarifa->getIdPoliticaCancelacion() ?>">
                                        <?php echo $tarifa->getIdPoliticaCancelacion() ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-check" style="margin-left: 28%;">
                            <input type="checkbox" name="general" id="general" class="form-check-input">
                            <label for="general" class="form-check-label">General</label>
                        </div>
                        <div class="btn-group-toggle" style="margin-left: 15%">
                            <button type="button" id="btnCT" class="btn btn-danger">Cancelar</button>
                            <button type="submit" id="btnAT" class="btn btn-success" onclick="goBack()">Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>


<script>
    function goBack() {
        window.history.back();
    }

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