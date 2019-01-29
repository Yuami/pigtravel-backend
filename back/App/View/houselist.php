<!DOCTYPE html>
<html lang="en" xmlns:class="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Cookie;
    use Config\Session;

    require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>List of houses</title>
</head>

<body>

<?php include_once("header.php");
if (Session::isSet("wrongHouse")) {
    Session::delete("wrongHouse");
    ?>
    <div id="wrongHouse" class="alert alert-danger" role="alert">
        You've no permission to see this house!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>


<?php //echo die(var_dump($mensajes)) ?>
<section class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Gestio Cases</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestio Cases</li>
            </ol>
            <button id="addHouse" onclick="window.location.href='/houses/create'"
                    class="btn btn-outline-primary col">
                Añadir Casa <span><i class="fas fa-plus"></i></span>
            </button>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <?php if (!empty($houses)) {
                foreach ($houses as $house) {
                    if ($house instanceof \Model\Items\Vivienda) ?>
                        <div class="col-md-4 col-xl-3 col-sm-6 mb-3">
                        <a href="/houses/<?php echo $house->getId() ?>" class="card p-0 card-show"
                                                                        style="color: inherit; text-decoration:none;">
                    <div class="view overlay">
                        <img src="<?= $house->image() ?>" alt="CASA" style="width: 100%;height: 250px;">
                    </div>
                    <div class="card-body ">
                        <p class="col font-weight-bold text-center">
                            <?php echo $house->getNombre() ?></p>
                        <p class="col font-weight-bold text-center">
                            <?php echo $house->getCiudad()->getNombre() ?></p>
                        <p class="col font-weight-bold text-center">
                            <?php $mensajesPendientes = 0;
                            foreach ($mensajes as $mensaje) {
                                if ($mensaje->getIdVivienda() == $house->getId()) {
                                    if ($mensaje->getLeido() == 0) {
                                        $mensajesPendientes++;
                                    }
                                }
                            }
                            echo 'Mensajes Pendientes ' . $mensajesPendientes; ?>
                        </p>
                    </div>
                    </a>
                    </div>
                <?php }
            } else { ?>
                <div id="firstHouse">
                    <h1 class="mt-5 text-center mb-5">Add your first house!</h1>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include_once("footer.php") ?>
</body>
</html>