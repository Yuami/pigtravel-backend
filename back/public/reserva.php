<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once("libraries.php") ?>
    <title>Plantilla para backend</title>
</head>

<body>
<?php include_once("header.php") ?>

<section>
    <div class="container my-3">
        <h2>Reserva
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
                                        <img src="img/casas/house1.jpg" alt="" class="vivienda-img rounded-circle">
                                        <h5 class="ml-2 mt-3">Nombre de la casa</h5>
                                        <a href="house.php" class="btn btn-primary ml-auto my-3 px-4 mr-2">VER</a>
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
                                        <img src="img/tempprofile.jpg" alt="" class="vivienda-img rounded-circle">
                                        <h5 class="ml-2 mt-3">Nombre cliente (Pero la foto de Phil mola 😅)</h5>
                                        <a href="#nothing" class="btn btn-primary ml-auto my-3 px-4 mr-2">VER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6>INFORMACIÓN</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <p class="ml-2 mt-3"><b>FECHAS:</b></p>
                                        <p class="ml-2 mt-3">ENTRADA 23-12-18</p>
                                        <p class="ml-2 mt-3">SALIDA 28-12-18</p>
                                        <p class="ml-2 ml-md-5 mt-3"><b>INQUILINOS:</b> 3</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6>HORAS</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <p class="ml-2 mt-3"><b>ENTRADA:</b> 13:00</p>
                                        <p class="ml-2 mt-3"><b>SALIDA:</b> 12:00</p>
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
                <a href="messages.php?idCliente=id" class="btn btn-primary mt-3 col-12">CHAT CON (NOMBRE CLIENTE)</a>
                <a href="#nothing" class="btn btn-primary mt-3 col-12">EDITAR/OFERTA</a>
                <a href="#nothing" class="btn btn-primary mt-3 col-12">ACEPTAR</a>
                <a href="#nothing" class="btn btn-danger mt-3 col-12">CANCELAR</a>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php") ?>

</body>
</html>