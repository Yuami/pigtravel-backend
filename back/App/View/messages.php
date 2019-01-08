<?php

use Config\Session;
use Model\DAO\PersonaDAO;
use Model\DAO\ViviendaDAO;

if (isset($_POST['submit'])) {
    self::store();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Mensajes</title>
</head>

<body>
<?php include_once("header.php");?>
<div class="container">
    <div class="row breadcrumb-row">
        <div class="col-md-10">
            <h1>Mensajes recibidos</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mensajes recibidos</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="form-group form-check-inline">
            <div class="btn-group">
                <button class="form-control border-0" id="mobilebutton" value="0"><i class="fa fa-eye-slash" id="icon"></i></button>
                <form>
                    <input type="button" value="Enviados" class="form-control border-0" onclick="window.location.href='/messagesSent'" />
                </form>
            </div>
                <select id="listaViviendas" class="form-control border-0" onChange="myNewFunction(this);">
                    <option selected="selected" value="0"><p>Casas</p></option>
                    <?php
                    foreach(ViviendaDAO::getBy('idVendedor',Session::get('userID')) as $vivienda) {
                        ?>
                        <option value="<?php echo $vivienda->getId();?>"><?php echo $vivienda->getNombre(); ?></option>
                    <?php } ?>
                </select>
                <input type="text" class="form-control border-0" id="myInput" onkeyup="myFunction()" placeholder="Busca.." title="Type in a name">
        </div>
    </div>
    <div class="row">
        <table id="cardsmensajes" class="table table-hover">
            <?php
            foreach(self::recibidos(Session::get('userID')) as $mensaje) {
                if($mensaje->getLeido()==0){ ?>
                    <tr class="openBtn" data-target="#myModal" data-toggle="modal" data-to="<?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre() ?>"  id="<?php echo $mensaje->getIdVivienda();?>">
                        <td style="width:25%"> <?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?><br><?php echo ViviendaDAO::getById($mensaje->getIdVivienda())->getNombre(); ?></td>
                        <td style="width:65%"> <?php echo $mensaje->getMensaje(); ?></td>
                        <td style="width:10%"><?php echo $mensaje->getFechaEnviado();?></td>
                    </tr>
                <?php }else{ ?>
                    <tr class="openBtn" data-target="#myModal" data-toggle="modal" data-to="<?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?>"  id="<?php echo $mensaje->getIdVivienda();?>">
                        <td> <strong><?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?><br><?php echo ViviendaDAO::getById($mensaje->getIdVivienda())->getNombre(); ?></strong></td>
                        <td><strong><?php echo $mensaje->getMensaje(); ?></strong></td>
                        <td><strong><?php echo $mensaje->getFechaEnviado();?></strong></td>
                    </tr>
                <?php } }?>
        </table>
    </div>
    <form id="addMessagesForm" method="POST" action="/messages">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Mensaje
                    </div>
                    <div class="modal-body">
                            <div id="nombreReciever"></div>
                            <input type="text" class="form-control" name="mensajeRespuesta" aria-describedby="basic-addon1" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tanca</button>
                        <input type="submit" class="btn btn-success" name="submit" value="Enviar" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectMensajes.js"></script>

</body>

</html>