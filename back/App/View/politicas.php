<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Session;

    require_once ROOT . "libraries.php" ?>
    <title>Politicas de Cancelacion</title>
</head>
<body class="bg-color-background">
<?php include_once("header.php"); ?>
<section class="container-fluid" id="mainHouseSection">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Politica de Cancelacion </h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/houses">House Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Politicas</li>
            </ol>
        </div>
    </div>
</section>
<section class="container-fluid">
    <div class="row justify-content-center col-12 my-5">
        <button type="button" class="btn btn-primary col-md-4 col-12" data-toggle="modal" data-target="#ModalT">
            Crear Linia Politica
        </button>
    </div>
    <?php if (!empty($liniasP)) { ?>
    <div class="row justify-content-center my-5">
        <?php foreach ($liniasP as $liniaP) { ?>
            <?php if (!($liniaP instanceof \Model\Items\LiniaPoliticaCancelacion)) continue; ?>
            <div class="card text-center shadow p-0 col-12 col-md-3 col-xl-2 mx-3 my-1">
                <div class="card-header">
                    <h5 class="card-title text-center">Linia Politica</h5>
                </div>
                <div class="card-body p-5">
                    <form action="/politicas/<?= $politica->getId() ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="idL" value="<?= $liniaP->getId() ?>">
                        <input type="hidden" name="idP" value="<?= $politica->getId() ?>">
                        <div class="form-group ">
                            <label class="col-form-label " for="lPD">Dias Descuento</label>
                            <input class="form-control text-center" type="number" name="dias" id="lPD"
                                   value="<?php echo $liniaP->getDias() ?>">
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label " for="lPP">Porcentaje Aplicado</label>
                            <input class="form-control text-center" type="number" name="porcentaje" id="lPP"
                                   value="<?php echo $liniaP->getPorcentaje() ?>">
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-12">
                                <button type="submit" id="btnAT" class="btn btn-success btn-block">Confirmar</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-group" action="/politicas/<?= $politica->getId() ?>" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="idL" value="<?= $liniaP->getId() ?>">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" id="btnAT" class="btn btn-danger btn-block">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
       <?php } ?>
    </div>
    <div class="modal fade" id="ModalT" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tarifa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="card-body" action="/politicas/<?= $politica->getId() ?>" method="post">
                        <div class="form-group">
                            <label for="dias" class="col-form-label">Dias</label>
                            <input type="number" class="form-control" name="dias" id="dias">
                        </div>
                        <div class="form-group">
                            <label for="porcentaje" class="col-form-label">Porcentaje</label>
                            <input type="number" name="porcentaje" id="porcentaje" class="form-control">
                        </div>
                        <div class="row justify-content-between m-2">
                            <button type="button" id="btnCT" class="btn btn-danger col-4" data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" id="btnAT" class="btn btn-success col-md-4 col-12 mr-5">
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    $('#ModalT').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('');
        var modal = $(this);
        modal.find('.modal-body input').val(recipient)
    });
</script>
</html>

<?php include_once("footer.php") ?>