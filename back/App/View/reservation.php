<?php

use Config\File;
use Config\Photos\Photos;

if (!($reserva instanceof \Model\Items\Reserva)) {
    die();
}

function toBtn($text, $onClick, bool $cancel = false)
{
    $type = $cancel ? 'btn-danger' : 'btn-primary';
    return '<button onclick="' . $onClick . '" class="btn ' . $type . ' my-1 mr-1">' . $text . '</button>';
}

$aceptar = toBtn("ACEPTAR", "aceptar()");
$oferta = toBtn("OFERTA", "ofertaModal()");
$cancel = toBtn("CANCELAR", "cancelar()", true);
$cancelAlerta = toBtn("CANCELAR", "cancelarAlerta()", true);

$seleccion = [
    "1" => [],
    "2" => [$cancelAlerta],
    "3" => [
        $aceptar,
        $oferta,
        $cancel
    ],
    "4" => [$cancelAlerta]
];

$btns = $seleccion[$reserva->getIdEstado()];

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
                        <table id="table1">
                            <?php
                            $counter = 0;
                            if (isset($mensajes))
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
                        <?php
                        foreach ($btns as $btn) {
                            echo $btn;
                        }
                        ?>
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
                                                    <img src="<?= $vivienda->image() ?>"
                                                         alt="apartamento alquiler vacacional"
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
                                <div class="card card-show">
                                    <a href="http://pigtravel.top/profile/<?= $cliente->getID() ?>/<?= $cliente->getNombre() ?>" target="_blank">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <div class="row">
                                                    <img src="<?= $cliente->image(); ?>"
                                                         alt="pigtravel user" class="vivienda-img rounded-circle">
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
                                                    <b>NOCHES:</b> <?= $reserva->getNoches() ?></p>
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

            <div class="modal" tabindex="-1" role="dialog" id="ofertaModal">
                <div class="modal-dialog" role="document">
                    <form method="post" action="/reservations/<?= $reserva->getId() ?>/oferta">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Oferta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3 col-12">
                                    <span class="input-group-text" id="basic-addon1">Casa</span>
                                    <input type="text" class="form-control" value="<?= $vivienda->getNombre() ?>" disabled>
                                </div>

                                <div class="input-group mb-3 col-12">
                                    <span class="input-group-text" id="basic-addon1">Noches</span>
                                    <input type="number" class="form-control" value="<?= $reserva->getNoches() ?>"
                                           disabled>
                                </div>

                                <div class="input-group mb-3 col-12">
                                    <span class="input-group-text" id="basic-addon1">Precio</span>
                                    <input type="number" class="form-control" name="oferta"
                                           value="<?= $reserva->getPrecio() ?>"
                                           min="10" max="<?= $reserva->getPrecio() - 1 ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="alertModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Alerta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <b>Estas seguro que quieres cancelar una reserva en este estado?</b>
                            <br>Se va a devolver todo el dinero al cliente.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="cancelar()">Cancelar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

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