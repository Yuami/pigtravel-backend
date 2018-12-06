<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>


</head>

<body>
<?php include_once("header.php") ?>
<div class="container mensajes">
    <div class="row">
        <h2>Messages</h2>
    </div>
    <div class="row">
        <p> <a href="index.php">Menu</a> > Messages</p>
    </div>
    <div class="row">
        <div class="form-group form-check-inline">

            <select class="form-control filtrosMensajes" id="listaViviendas">
                <option value="-1">Cases</option>
            </select>
            <div class="btn-group">
                <button class="form-control filtrosMensajes" id="botonLeido">leido</button>
                <button class="form-control filtrosMensajes" id="botonEnviado">enviado</button>
            </div>
        </div>
    </div>
    <div class="row">
         <div id="cardsmensajes">
    </div>
    </div>

</div>
<?php include_once("footer.php") ?>
<script type="text/javascript" src="js/selects/selectMensajes.js"></script>
</body>
</html>