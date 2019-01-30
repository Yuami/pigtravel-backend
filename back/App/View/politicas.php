<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Session;

    function noHours($date)
    {
        return explode(' ', $date)[0];
    }

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
<section class="container">
    <div class="card-deck">
        <?php foreach ($liniasP as $liniaP) { ?>
            <?php if (!($liniaP instanceof \Model\Items\LiniaPoliticaCancelacion)) continue; ?>
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title text-center">Linia Politica</h5>
                </div>
                <div class="card-body p-5">
                    <form action="/liniaspoliticas/<?php echo $liniaP->getId() ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group ">
                            <label class="col-form-label " for="lPD">Dias Descuento</label>
                            <input class="form-control text-center" type="number" name="lPD" id="lPD"
                                   value="<?php echo $liniaP->getDias() ?>">
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label " for="lPP">Porcentaje Aplicado</label>
                            <input class="form-control text-center" type="number" name="lPP" id="lPP"
                                   value="<?php echo $liniaP->getPorcentaje() ?>">
                        </div>
                        <div class="form-group row justify-content-center mt-4">
                            <button type="submit" id="btnAT" class="btn btn-success col-4">Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
</body>
</html>
<?php include_once("footer.php") ?>