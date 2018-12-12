<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Plantilla para backend</title>
</head>

<body>
<?php include_once "header.php" ?>

<section>
    <div class="container my-3">
        <h2>Reserva #(Numero Reserva)
            <small><span class="badge badge-pill badge-secondary">Pendiente</span></small>
        </h2>
        <div class="row">

            <div class="col-md-8">
                <div class="card p-3 bg-light">
                    <div class="">
                        <h6>CASA</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <img src="/img/casas/house1.jpg" alt="" class="vivienda-img rounded-circle">
                                        <h5 class="ml-2 mt-3">Nombre de la casa</h5>
                                        <a href="/houses/id"
                                           class="btn btn-primary ml-auto my-3 px-4 mr-2">VER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6>CLIENTE</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <img src="/img/tempprofile.jpg" alt="" class="vivienda-img rounded-circle">
                                        <h5 class="ml-2 mt-3">Nombre cliente</h5>
                                        <a href="/profile/id" class="btn btn-primary ml-auto my-3 px-4 mr-2">VER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6>INGRESOS</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <p class="ml-2 mt-3"><b>TOTAL:</b> 320$</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <a href="/messages/id1/id2" class="btn btn-primary mt-3 col-12">CHAT CON (NOMBRE
                    CLIENTE)</a>
                <a href="#nothing" class="btn btn-primary mt-3 col-12">EDITAR/OFERTA</a>
                <a href="#nothing" class="btn btn-primary mt-3 col-12">ACEPTAR</a>
                <a href="#nothing" class="btn btn-danger mt-3 col-12">CANCELAR</a>
            </div>
        </div>
        <!-- CALENDARS -->
        <div class="row pb-3">
            <div class="col-md-6">
                <div id="mainCalendar"></div>
            </div>
            <div class="col-md-6">
                <div id="nextCalendar"></div>
            </div>
        </div>

        <button type="button" class="fc-prev-button btn btn-primary" id="prevMonth">
            <span class="fa fa-chevron-left"></span> PREV
        </button>

        <button type="button" class="fc-prev-button btn btn-primary" id="nextMonth">
            NEXT <span class="fa fa-chevron-right"></span>
        </button>
    </div>
</section>

<?php include_once "footer.php" ?>
<?php include_once CALENDAR ?>
<script src="/js/calendar.js"></script>
</body>
</html>