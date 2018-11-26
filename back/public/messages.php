<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="STYLESHEET" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" type="text/css">
    <title>Mensajes</title>
</head>

<body>
<?php include_once("header.php") ?>
<div class="gran">
    <div class="row">
        <h1>Messages</h1>
    </div>
    <div class="row">
        <p> <a href="index.php">Menu</a> > Messages</p>
    </div>
    <div class="row">
        <div class="dropdown">
            <button  type="button" class="filtro dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-home"></i>
            </button>
            <div class="dropdown-menu" id="dropdownidTipoVivienda">
            </div>
        </div>
        <div>
            <button type="button" class="filtro">
                <i class="far fa-eye"></i>
            </button>
        </div>
        <div>
            <button  type="button" class="filtro">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table id="datatable_demo" class="display" cellspacing="0" width="100%">
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable_demo').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "info/selectMensajes.php",
                "type": "POST",
                "dataSrc": "records"
            },
            "columns": [
                { "data": "mensaje" }

            ]
        });
    });
</script>


</body>
</html>