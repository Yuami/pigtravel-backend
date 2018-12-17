<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
</head>

<body>
<?php include_once("header.php");?>
<div class="container mensajes">
    <div class="row">
        <h2>Messages</h2>
    </div>
    <div class="row">
        <p> <a href="index.php">Menu</a> > Messages</p>
    </div>
    <div class="row">
        <div class="form-group form-check-inline">
            <div class="btn-group">
                <button class="form-control border-0" id="botonLeido"><i class="far fa-eye-slash"></i></button>
                <button class="form-control border-0" id="botonEnviado">Enviados</button>
            </div>
                <select id="listaViviendas" class="form-control border-0">
                       <option value="-1"><p>Casas</p></option>
                    <?php
                    foreach(ViviendaDAO::getBy('idVendedor',4) as $vivienda) {
                    ?>
                    <option><?php echo $vivienda->getNombre(); ?></option>
                    <?php } ?>
                </select>
        </div>
    </div>
    <div class="row">
         <div id="cardsmensajes">
             <?php
             foreach(self::enviados($_SESSION["userID"],true,0) as $mensaje) {
               ?>
             <div class="card cardMessages">
                 <div class='card-body missatgeCard'>
                     <div class='row'>
                         <div class='col-md-4'>
                             <div class="row"><?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?></div>
                             <div class='row'><?php echo ViviendaDAO::getById($mensaje->getIdVivienda())->getNombre(); ?></div>
                         </div>
                         <div class='col-md-6'><?php echo $mensaje->getMensaje(); ?></div>
                         <div class='col-md-2'><?php echo $mensaje->getFechaEnviado();?></div>
                     </div>
                 </div>
             </div>
             <?php } ?>
        </div>
    </div>

</div>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectMensajes.js"></script>
</body>
</html>