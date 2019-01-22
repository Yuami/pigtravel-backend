<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
</head>
<body>
<?php include_once("header.php"); ?>
<div class="container">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1" >
            <h1>Mensajes recibidos</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/messages">Mensajes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mensajes recibidos</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="form-group form-check-inline">
            <div class="btn-group">
                <form>
                    <input class="form-control border-0" type="button" value="Recibidos" onclick="history.back()"/>
                </form>
            </div>
            <select id="listaViviendas" class="form-control border-0">
                <option value="-1"><p>Casas</p></option>
                <?php
                foreach ($viviendas as $vivienda) {
                    ?>
                    <option><?php echo $vivienda->getNombre(); ?></option>
                <?php } ?>
            </select>
            <input type="text" class="form-control border-0" id="myInput" onkeyup="myFunction()" placeholder="Busca.."
                   title="Type in a name">
        </div>
    </div>
    <div class="row">
        <table id="cardsmensajes" class="table table-hover">

            <?php
            foreach ($mensajes as $mensaje) {
                ?>
                <tr class="openBtn" data-leido="0" data-target="#myModal" data-toggle="modal"
                    data-id="<?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?>"
                    id="<?php echo $mensaje->getIdVivienda(); ?>">

                    <td style="width:25%"> <?php echo PersonaDAO::getById($mensaje->getIdReciever())->getNombre(); ?>
                        <br><?php echo ViviendaDAO::getById($mensaje->getIdVivienda())->getNombre(); ?></td>
                    <td style="width:65%"><?php echo $mensaje->getMensaje(); ?></td>
                    <td style="width:10%"><?php echo $mensaje->getFechaEnviado(); ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>

</div>
<?php include_once("footer.php") ?>
<script src="/js/selects/selectMensajes.js"></script>
</body>
</html>