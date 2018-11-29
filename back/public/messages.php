<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <!-- js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <title>Mensajes</title>
</head>

<body>
<?php include_once("header.php") ?>
<div class="container">
    <div class="row">
        <h1>Messages</h1>
    </div>
    <div class="row">
        <p> <a href="index.php">Menu</a> > Messages</p>
    </div>
    <div class="row">
        <div class="col">
            <table id="taula" class="table table-striped table-bordered" style="width:100%">
                 <tbody>
                 </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $('#taula').DataTable( {
            processing: true,
            serverSide: true,
            pagination: false,
            ajax: {
                url: 'info/selectMensajes.php',
                type: 'POST',
                dataSrc: 'records'
            },
            columns: [
                {
                    foto: 'fotoPerfil',
                    render: function (foto, type, row) {
                        return '<img src="' + foto + '" />';
                    }
                },
                { data: 'nombreSender' },
                { data: 'nombreCasa' },
                { data: 'mensaje' },
                { data: 'fechaEnviado' }
            ],
            dom: 'Bfrtip',
            buttons: [
                { text: 'leido'
                        .column(  )
                        .data()
                        .filter( function ( value, index ) {
                            return value > 0 ? true : false;
                        } );
                }
            ]
        } );
    } );
</script>
</body>
</html>