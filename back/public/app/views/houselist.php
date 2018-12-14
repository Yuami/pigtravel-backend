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

    <div class="row justify-content-center " id="cardCasa">
    </div>
</section>

<?php include_once("footer.php") ?>
<script src="/js/selects/selectViviendaLista.js"></script>
<script src="/js/datatables.min.js"></script>
<script src="/js/jquery.dataTables.js"></script>
<script src="/js/houselistDatatable.js"></script>
</body>
</html>