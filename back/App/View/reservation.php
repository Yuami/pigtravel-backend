<?php

use Config\File;
use Config\Photos\Photos;

if (!($reserva instanceof \Model\Items\Reserva)) {
    die();
}
$vivienda = $reserva->getVivienda();
$cliente = $reserva->getCliente();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Reserva</title>
    <style>
        #table1 {
            border-collapse: separate;
            border-spacing: 15px;
            border: 0px;
        }
    </style>
</head>

<body>
<?php include_once "header.php" ?>
<section>
    <div class="container-fluid">
        <div class="row flex-xl-nowrap">
            <div class="col-12 col-md-3 col-xl-2"></div>
            <div class="col-12 col-md-3 col-xl-2 order-2">
                <div class="mt-5">
                    <h2>Mensajes</h2>
                    <p><strong>Últimos 2 mensajes</strong></p>
                    <a href="/messages/<?= $reserva->getID(); ?>" style="text-decoration: none">
                    <table id="table1" >
                        <?php
                        $counter = 0;
                        foreach ($mensajes as $mensaje) {
                            if ($counter >= 2)
                                break; ?>
                            <tr>
                                <td><?php echo $mensaje->getMensaje(); ?></td>
                            </tr>
                            <?php
                            $counter++;
                        } ?>
                    </table>
                    </a>
                </div>
            </div>

            <main class="col-12 col-md-9 col-xl-8 py-md-3" role="main">
                <h2>Reserva #<?= $reserva->getId() ?>
                    <small><span id="estado-reserva"
                                 class="badge badge-pill"><?= $reserva->getNombreEstado() ?></span>
                    </small>
                </h2>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary col-auto my-1" data-toggle="modal"
                                data-target="#exampleModal">CALENDARIO
                        </button>
                        <a href="#nothing" class="btn btn-primary col-auto my-1">ACEPTAR</a>
                        <a href="#nothing" class="btn btn-primary col-auto my-1">EDITAR/OFERTA</a>
                        <a href="#nothing" class="btn btn-danger col-auto my-1">CANCELAR</a>
                    </div>
                    <div class="col-12">
                        <div class="card p-3 bg-light">
                            <div class="">
                                <h6>CASA</h6>
                                <div class="card card-show">
                                    <a href="<?= $vivienda->link() ?>">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <div class="row">
                                                    <img src="<?= $vivienda->photo() ?>"
                                                         alt=""
                                                         class="vivienda-img rounded-circle">
                                                    <h5 class="ml-2 mt-3"><?= $vivienda->getNombre() ?></h5>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="mt-3">
                                <h6>CLIENTE</h6>
                                <a href="/messages/<?= $reserva->getID(); ?>"
                                   class="btn btn-primary col-auto my-1">CHAT
                                    CON <?= strtoupper($cliente->getNombre()); ?></a>
                                <div class="card card-show">
                                    <a href="/profile/<?= $cliente->getID() ?>">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <div class="row">
                                                    <img src="<?= $cliente->image(); ?>"
                                                         alt="" class="vivienda-img rounded-circle">
                                                    <h5 class="ml-2 mt-3"><?= $cliente->getNombreCompleto(); ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="mt-3">
                                <h6>INGRESOS</h6>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="row">
                                                <p class="col-12 ml-2 mt-3">
                                                    <b>CALCULO:</b> <?= $reserva->getCalculo() ?></p>
                                                <p class="col-12 ml-2 mt-3">
                                                    <b>CALCULO:</b> <?= $reserva->getDias() ?></p>
                                                <p class="col-12 ml-2 mt-3"><b>GANANCIAS:</b>
                                                    $<?= $reserva->getIngreso() ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <h6>DETALLE</h6>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="row">
                                                <p class="ml-2 mt-3">
                                                    <b>Total clientes: </b><?= $reserva->getTotalClientes() ?>
                                                </p>
                                                <p class="ml-2 mt-3">
                                                    <b>Fecha creación: </b><?= $reserva->getFechaReserva() ?>
                                                </p>
                                                <h6 class="col-12"><b>Cambios:</b></h6>
                                                <p id="cambios" class="col-12"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let json = <?= $reserva->getCambiosJSON(); ?>;
                                let container = $('#cambios');
                                json.forEach(item => {
                                    container.append(cambioHTML(item));
                                });

                                function cambioHTML({estado, fechaCambio}) {
                                    return `<p class="col-12">${estado} : ${fechaCambio} </p>`
                                }
                            </script>

                            <!-- #######################CALENDARIOS############################### -->
                        </div>
                    </div>
                </div>
            </main>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Calendar Reserva</h5>
                            <button type="button" class="fc-prev-button btn btn-primary ml-auto" id="prevMonth">
                                <span class="fa fa-chevron-left"></span> PREV
                            </button>

                            <button type="button" class="fc-prev-button btn btn-primary ml-auto" id="nextMonth">
                                NEXT <span class="fa fa-chevron-right"></span>
                            </button>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="calendars">
                                <div id="mainCalendar" data-f_inicio="<?= $reserva->getCheckIn(); ?>"
                                     data-f_fin="<?= $reserva->getCheckOut(); ?>"></div>

                                <div id="nextCalendar"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php include_once "footer.php" ?>
<?php include_once CALENDAR ?>
<script src="/js/calendar.js"></script>
<script src="/js/estadoReserva.js"></script>
</body>
</html>