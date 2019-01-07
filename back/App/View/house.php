<?php

use Model\DAO\ViviendaDAO;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <title>House</title>
</head>
<body class="bg-color-background">
<?php include_once("header.php") ?>
<section class="container">
    <div class="card">
        <div class="card-title row justify-content-center">
            <h1><?php echo $vInfo->getNombre() ?></h1>
        </div>
        <div class="card-img-top">
            <div class="row justify-content-center">
                <div id="carouselCasas" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#carouselCasas" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselCasas" data-slide-to="1"></li>
                        <li data-target="#carouselCasas" data-slide-to="2"></li>
                        <li data-target="#carouselCasas" data-slide-to="3"></li>
                    </ul>
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/casas/1.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/casas/2.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/casas/3.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/casas/4.jpg" style="width: auto; height: 300px;" alt="Los Angeles House">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#carouselCasas" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselCasas" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="dropdown mb-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Politicas Cancelacion
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drop-down-list">
                </div>
            </div>
            <!--            <div class="input-group mb-3 row justify-content-between">-->
            <!--                -->
            <!--                <select class="custom-select col-5" id="selectTarifa">-->
            <!--                    <option value="" selected>Tarifa...</option>-->
            <!--                </select>-->
            <!--                <select class="custom-select col-5" id="selectRebaja">-->
            <!--                    <option value="" selected>Rebaja...</option>-->
            <!--                </select>-->
            <!--            </div>-->
            <!--            <table class="table table-striped table-responsive" id="listadoTarifas">-->
            <!--                <thead>-->
            <!--                <tr>-->
            <!--                    <th>ID</th>-->
            <!--                    <th>Fecha Inicio</th>-->
            <!--                    <th>Fecha Fin</th>-->
            <!--                    <th>Precio</th>-->
            <!--                    <th>General</th>-->
            <!--                    <th>Politica Cancelacion</th>-->
            <!--                </tr>-->
            <!--                </thead>-->
            <!--            </table>-->
            <!--            <div class="container">-->
            <!--                <ul class="list-group mb-3" id="list-group-tarifa"></ul>-->
            <!--                <ul class="list-group mb-3" id="list-group-rebaja"></ul>-->
            <!--                <ul class="list-group mb-3" id="list-group-vivienda-tarifa"></ul>-->
            <!--                <h2>Politicas Cancelacion</h2>-->
            <!--                <div class="row">-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="list-group" id="list-group-politica-cancelacion" role="tablist"></div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-8">-->
            <!--                        <div class="tab-content" id="nav-tabContent"></div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->


            <button type="button" id="myBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Crear Tarifa
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear Tarifa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="fechaI" class="col-form-label">Fecha Inicio</label>
                                    <input type="date" class="form-control" id="fechaI">
                                </div>
                                <div class="form-group">
                                    <label for="fechaF" class="col-form-label">Fecha Fin</label>
                                    <input type="date" name="fechaF" id="fechaF" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="precio" class="col-form-label">Precio</label>
                                    <input type="number" name="precio" id="precio" class="form-control">
                                </div>
                                <div class="form-group row justify-content-center">
                                    <input type="checkbox" name="general" id="general" class="form-control">
                                    <label for="general" class="form-check-label">General</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Crear Tarifa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "inline";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php include_once("footer.php") ?>
<script src="/js/selects/selectTarifa-Rebaja.js"