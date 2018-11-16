<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>List of houses</title>
</head>

<body>
<?php include_once("header.php") ?>

<section>
    <h1>Houses</h1>
    <div class="input-group mb-3">
        <select class="custom-select" id="selectTarifa">
            <option selected>Tarifa...</option>
        </select>
        <select class="custom-select" id="selectRebaja">
            <option selected>Rebaja...</option>
        </select>
    </div>

    <table class="table table-striped" id="listadoViviendas">

    </table>
</section>


<?php include_once("footer.php") ?>
<script src="js/selects/selectTarifas.js"></script>
</body>
</html>