<?php

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
<?php include_once("header.php"); ?>
<div class="container">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Mensajes recibidos</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mensajes recibidos</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="form-group form-check-inline">
            <div class="btn-group">
                <button class="form-control border-0" id="mobilebutton" value="0"><i class="fa fa-eye-slash"
                                                                                     id="icon"></i></button>
                <form>
                    <input type="button" value="Enviados" class="form-control border-0"
                           onclick="window.location.href='/messagesSent'"/>
                </form>
            </div>
            <select id="listaViviendas" class="form-control border-0" onChange="myNewFunction(this);">
                <option selected="selected" value="0"><p>Casas</p></option>
                <?php
                foreach ($viviendas as $vivienda) {
                    ?>
                    <option value="<?php echo $vivienda->getId(); ?>"><?php echo $vivienda->getNombre(); ?></option>
                <?php } ?>
            </select>
            <input type="text" class="form-control border-0" id="myInput" onkeyup="myFunction()" placeholder="Busca.."
                   title="Type in a name">
        </div>
    </div>
    <div class="table-responsive">
        <table id="cardsmensajes" class="table table-hover">
            <?php if (isset($mensajes))
                foreach ($mensajes as $mensaje) {
                    $persona = $recievers[$mensaje->getIdSender()][0];
                    ?>
                    <tr class="openBtn" data-target="#myModal" data-toggle="modal"
                        data-to="<?= $persona->getNombre(); ?>"
                        data-leido="<?= $mensaje->getLeido(); ?>"
                        data-id-viv="<?= $mensaje->getIdVivienda(); ?>"
                        data-id="<?= $persona->getId(); ?>"
                        id="<?= $mensaje->getId(); ?>">

                        <?php if ($mensaje->getLeido() == 0) { ?>
                            <td style="width:25%">
                                <?= $persona->getNombre(); ?>
                                <br><?php foreach ($viviendas as $vivienda) {
                                    if ($vivienda->getId() == $mensaje->getIdVivienda()) {
                                        echo $vivienda->getNombre();
                                    }
                                } ?>
                            </td>

                            <td style="width:65%"> <?= $mensaje->getMensaje(); ?></td>
                            <td style="width:10%"><?= $mensaje->getFechaEnviado(); ?></td>
                        <?php } else { ?>
                            <td style="width:25%">
                                <strong>
                                    <?= $persona->getNombre(); ?>
                                    <br><?php foreach ($viviendas as $vivienda) {
                                        if ($vivienda->getId() == $mensaje->getIdVivienda()) {
                                            echo $vivienda->getNombre();
                                        }
                                    } ?>
                                </strong>
                            </td>
                            <td style="width:65%"><strong><?= $mensaje->getMensaje(); ?></strong></td>
                            <td style="width:10%"><strong><?= $mensaje->getFechaEnviado(); ?></strong></td>
                        <?php } ?>
                    </tr>

                    <form id="addMessagesForm" method="POST" action="/messages">
                        <div class="modal fade" id="myModal<?= $mensaje->getId() ?>" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content modalChat">
                                    <div class="modal-header">
                                        <div class="col-lg-4">
                                            <p class="modal-title">Mensaje a <?= $persona->getNombre(); ?></p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p align="center">
                                                <?php foreach ($viviendas as $vivienda) {
                                                    if ($vivienda->getId() == $mensaje->getIdVivienda()) {
                                                        echo $vivienda->getNombre();
                                                    }
                                                } ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="chat">

                                            <?php foreach ($mensajesChat as $mensajeChat) {
                                                if ($mensaje->getIdSender() == $mensajeChat->getIdSender() && $mensaje->getIdVivienda() == $mensajeChat->getIdVivienda()) {
                                                    ?>
                                                    <div class="row justify-content-end">
                                                        <div class="missatge darker">
                                                            <?= $mensajeChat->getMensaje(); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                if ($mensaje->getIdSender() == $mensajeChat->getIdReciever() && $mensaje->getIdVivienda() == $mensajeChat->getIdVivienda()) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="missatge noDarker">
                                                            <?= $mensajeChat->getMensaje(); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </div>
                                        <input type="hidden" name="idReciever"
                                               value="<?= $mensaje->getIdSender(); ?>">
                                        <input type="hidden" name="idVivienda"
                                               value="<?= $mensaje->getIdVivienda(); ?>">
                                        <input type="hidden" name="idMensaje" value="<?= $mensaje->getId(); ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <input type="text" class="form-control" name="mensajeRespuesta"
                                               aria-describedby="basic-addon1"/>
                                        <input type="submit" class="btn btn-success" name="submit" value="Enviar"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>


                <?php } ?>

        </table>
    </div>


</div>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectMensajes.js"></script>
</body>

</html>