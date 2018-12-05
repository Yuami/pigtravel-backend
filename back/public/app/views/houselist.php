<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>List of houses</title>
</head>

<body>
<?php include_once("header.php") ?>
<section>
    <h1><a href="house.phplic/routes.php">House</a></h1>
    <h1>Houses</h1>

    <div class="row">
        <div class="col">
            <table id="listaCasas" class="display table table-striped table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>House</th>
                    <th>Tipo Vivienda</th>
                    <th>Capacity</th>
                    <th>Street</th>
                    <th>Ciudad</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Alquiler Automatico</th>
                    <th>Square Meters</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Tipo Viviendas
        </button>
        <div class="dropdown-menu" id="dropdownidTipoVivienda">
        </div>
    </div>

    <div class="input-group mb-3">
        <select class="custom-select" id="selectVendedor">
            <option selected>Vendedor...</option>
        </select>
        <select class="custom-select" id="selectCasas">
            <option selected>Tipo de Casa...</option>
        </select>
    </div>

    <table class="table table-striped" id="listadoViviendas">

    </table>

    <div id="llistaReserves">

    </div>


</section>

<?php include_once("footer.php") ?>
<script src="/js/selects/selectTipoVivienda.js"></script>
<script src="/js/selects/selectViviendaLista.js"></script>
<script src="/js/selects/selectViviendas.js"></script>
<script src="/js/selects/selectVendedorsViviendas.js"></script>
<script src="/js/datatables.min.js"></script>
<script src="/js/jquery.dataTables.js"></script>
<script src="/js/custom/houselistDatatable.js"></script>
</body>
</html>