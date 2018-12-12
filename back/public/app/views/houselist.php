<!DOCTYPE html>
<html lang="en" xmlns:class="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>List of houses</title>
</head>

<body>
<?php include_once("header.php") ?>
<section class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Gestio Cases</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestio Cases</li>
            </ol>
        </div>
    </div>
    <!-- <div class="row" id="cardCasa">

     </div>-->
    <div class="row justify-content-center col-12" id="cardCasa">
        <!-- Card -->
        <div class="card col-3">
            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <!-- Button -->
            <a class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i class="fa fa-chevron-right pl-1"></i></a>
            <!-- Card content -->
            <div class="card-body">
                <!-- Title -->
                <h4 class="card-title">Card title</h4>
                <hr>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <!-- Card footer -->
            <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                <ul class="list-unstyled list-inline font-small">
                    <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>05/10/2015</li>
                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i
                                    class="fa fa-comments-o pr-1"></i>12</a></li>
                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i
                                    class="fa fa-facebook pr-1"> </i>21</a></li>
                    <li class="list-inline-item"><a href="#" class="white-text"><i class="fa fa-twitter pr-1"> </i>5</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php") ?>
<script src="js/selects/selectViviendaLista.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="../../../../front/js/houselistDatatable.js"></script>
</body>
</html>