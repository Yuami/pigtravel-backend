<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Premium</title>
</head>

<body>
<?php include_once("header.php") ?>

<div class="container-fluid descripcionSubscripcion"  >

        <div class="row center tituloSubscripciones">
            <b>HAZTE PREMIUM, CONSIGUE MÁS BENEFICIOS!</b>
        </div>
        <div class="row center">
            <h1>¿Por què pasarte a premium?</h1>
        </div>
        <div class="row iconosDescripcio">
            <div class="col-4">
                <div class="card card-subs col-md-8 offset-md-2">
                    <div class="card-body">
                        <span class="glyphicon glyphicon-star"></span>
                        <h2 class="card-title">Recomendados</h2>
                        <h4 class="card-text">Marca tu casa para que aparezca en recomendados</h4>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-subs col-md-8 offset-md-2">
                    <div class="card-body">
                        <i class="far fa-edit fa-8x"></i>
                        <h2 class="card-title">Página web</h2>
                        <h4 class="card-text">Podrás crear una web propia para tu casa de forma sencilla</h4>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-subs col-md-8 offset-md-2">
                    <div class="card-body">
                        <i class="fa fa-line-chart"></i>
                        <h2 class="card-title">Visitas</h2>
                        <h4 class="card-text">Obtén más visitas con las que tendrás más beneficios</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid"  >
        <div class="row center subscripciones">
            <h3><b>SUBSCRIPCIONES</b></h3>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card subscripcion1 col-md-8 offset-md-2">
                    <div class="card-body">
                        <h2 class="card-title">PACK 1</h2>
                        <div class="iconoSubscripciones">
                            <i class="fas fa-home fa-6x" ></i>
                        </div>
                        <h4 class="card-text">100€</h4>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card subscripcion2 col-md-8 offset-md-2">
                    <div class="card-body">
                        <h2 class="card-title">PACK 5</h2>
                        <img src="img/5houseIcon.svg">
                        <h4 class="card-text">450€</h4>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card subscripcion3 col-md-8 offset-md-2">
                    <div class="card-body">
                        <h2 class="card-title">PACK 10</h2>
                        <img src="img/10houseIcon.svg">
                        <h4 class="card-text">950€</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once("footer.php") ?>

</body>
</html>