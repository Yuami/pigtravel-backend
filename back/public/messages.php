<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once("libraries.php") ?>

</head>

<body>
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

       <div id="cardsmensajes">
       </div>

</div>
<script type="text/javascript" src="js/selects/selectMensajes.js"></script>
</body>
</html>