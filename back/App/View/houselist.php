<!DOCTYPE html>
<html lang="en" xmlns:class="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Cookie;

    require_once ROOT . "libraries.php" ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>List of houses</title>
</head>

<body>

<?php include_once("header.php");
if (Cookie::isSet("wrongHouse")) {
    Cookie::delete("wrongHouse");
    ?>
    <div id="wrongHouse" class="alert alert-danger" role="alert">
        You've no permission to see this house!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>



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
    <div id="firstHouse">
        <h1 class="text-center mb-5">Add your first house!</h1>
    </div>
    <div class="row justify-content-center">
        <button id="addHouse" onclick="window.location.href='/houses/create'" class="btn btn-outline-success">Añadir
            Casa
            <span><i class="fas fa-plus"></i></span></button>
    </div>
    <div class="container-fluid">
        <div class="row" id="cardCasa">

        </div>
    </div>
</section>

<?php include_once("footer.php") ?>

<script src="/js/selects/selectViviendaLista.js"></script>
</body>
</html>