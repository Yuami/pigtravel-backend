<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <div class="form-group col-2 form-check-inline">
        <button class="form-control" id="botonLeido">leido</button>
        <button class="butt form-control">Enviados</button>
    </div>
    <div id="cardsmensajes" class="row cardMessages">
    </div>
    </div>
<script type="text/javascript" src="js/selects/selectMensajes.js"></script>
</body>
</html>