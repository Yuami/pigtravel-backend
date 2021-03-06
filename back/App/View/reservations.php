<!DOCTYPE html>
<html lang="en" xmlns:color="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php use Config\Session;

    require_once ROOT . "libraries.php" ?>
    <script src="/js/jquery.dataTables.js"></script>
    <title>Reservations</title>
</head>

<body>
<?php include_once("header.php");
if (Session::isSet("wrongReservation")) {
    Session::delete("wrongReservation");
    ?>
    <div id="wrongReservation" class="alert alert-danger" role="alert">
        You've no permission to see this reservation!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<?php include_once("header.php") ?>

<div class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Gestio Reservas</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestio Reservas</li>
            </ol>
        </div>
    </div>
    <section class="container">
        <div class="row">
            <table id="taula" class="table table-responsive-md table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Casa</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio</th>
                </tr>
                </thead>
                <?php
                foreach ($reservas as $r) {
                    if ($r instanceof \Model\Items\Reserva) {
                        ?>
                        <tr class="reserva" id="<?php echo $r->getVivienda()->getId() ?>"
                            onclick="window.location='<?php echo $r->link() ?>'" onchange="filtro()">
                            <td><?php echo $r->getVivienda()->getNombre() ?></td>
                            <td><?php echo $r->getNombreEstado() ?></td>
                            <td><?php echo $r->getCliente()->getNombre() ?></td>
                            <td><?php echo $r->getFechaReserva() ?></td>
                            <td><?php echo $r->getPrecio() ?></td>
                        </tr>
                    <?php }
                } ?>

            </table>
        </div>
    </section>
</div>
<?php include_once("footer.php") ?>
</body>

</html>
