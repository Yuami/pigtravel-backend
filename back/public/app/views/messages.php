<?php
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
<div class="container mensajes">
    <div class="row">
        <h2>Mensajes</h2>
    </div>
    <div class="row">
        <p> <a href="index.php">Menu</a> > Mensajes</p>
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
        </div>

    </div>
    <div class="row">
        <div id="cardsmensajes">
            <?php
            foreach(self::recibidos(Session::get('userID')) as $mensaje) {
                if($mensaje->getLeido()==0){
                    ?>
                    <a class="cardMessages openBtn" id="<?php echo $mensaje->getIdVivienda()?>">
                        <div class="card cardMessages" id='<?php echo $mensaje->getLeido(); ?>' >
                            <div class='card-body missatgeCard'>
                                <div class='row'>
                                    <div class='col-md-3'>
                                        <div class="row"><?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?></div>
                                        <div class='row'><?php echo ViviendaDAO::getById($mensaje->getIdVivienda())->getNombre(); ?></div>
                                    </div>
                                    <div class='col-md-6'><?php echo $mensaje->getMensaje(); ?></div>
                                    <div class='col-3'>
                                        <div class='row'><?php echo $mensaje->getFechaEnviado();?></div>
                                        <form method="post">
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            Mensaje
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-6">To: <?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="mensajeRespuesta" aria-describedby="basic-addon1" />
                                                                </div>
                                                            </div>
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

                                </div>
                            </div>
                        </div>
                    </a>
                <?php }else{ ?>
                    <a class="cardMessages openBtn" id="<?php echo $mensaje->getIdVivienda()?>">
                        <div class="card cardMessages" id=<?php echo $mensaje->getLeido(); ?>>
                            <div class='card-body missatgeCard'>
                                <div class='row'>
                                    <div class='col-md-3'>
                                        <div class="row"><strong><?php echo PersonaDAO::getById($mensaje->getIdSender())->getNombre(); ?></strong></div>
                                        <div class='row'><strong><?php echo ViviendaDAO::getById($mensaje->getIdVivienda())->getNombre(); ?></strong></div>
                                    </div>
                                    <div class='col-md-6'><strong><?php echo $mensaje->getMensaje(); ?></strong></div>
                                    <div class='col-3'>
                                        <div class='row'><strong><?php echo $mensaje->getFechaEnviado();?></strong></div>
                                        <form method="post" role="form">
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            Mensaje
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-6">To: <?php echo PersonaDAO::getById($mensaje->getIdReciever())->getNombre(); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <input type="text" class="form-control" name="mensajeRespuesta" aria-describedby="basic-addon1" />
                                                            </div>
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
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } }?>
        </div>
    </div>

</div>
<?php include_once("footer.php") ?>
<script>
    $('.openBtn').on('click',function(){
        $('#myModal').modal({show:true});
    });
    function myNewFunction(sel) {
        var val=sel.options[sel.selectedIndex].value;
        if(val==0){
            $("a.openBtn").show();
        }else {
            $("a.openBtn").hide();
            $("a[id=" + val + "].openBtn").show();
        }
    }
</script>
<script src="/js/selects/selectMensajes.js"></script>

</body>

</html>