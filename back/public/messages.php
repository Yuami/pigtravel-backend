<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <?php include_once("libraries.php") ?>

</head>

<body>
<?php include_once("header.php") ?>
<div class="container">
    <div class="row">
        <h1>Messages</h1>
    </div>
    <div class="row">
        <p> <a href="index.php">Menu</a> > Messages</p>
    </div>
    <div class="row">
        <div class="form-group form-check-inline">

            <select class="form-control filtrosMensajes" id="listaViviendas">
                <option value="-1">Cases</option>
            </select>

            <button class="form-control filtrosMensajes" id="botonLeido">leido</button>
        </div>
    </div>
    <div id="cardsmensajes" class="row cardMessages">
    </div>
</div>
<script type="text/javascript" src="js/selects/selectMensajes.js"></script>
</body>
</html>