<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.css">
</head>
<body>

<section class="container">
    <h1>Houses</h1>

    <div class="row">
        <div class="col">
            <table id="listaCasas" class="table table-striped table-bordered nowrap" style="width: 100%;">
                <thead>
                <tr>
                    <th>Vivienda</th>
                    <th>Tarifa</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal fade" id="viviendasEditModal" tabindex="-1" role="dialog" aria-labelledby="viviendasEditModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ID
                    <input type="text" class="mb-3" name="viviendaID" id="viviendaID" disabled/>
                    <br>
                    NOMBRE
                    <input type="text" class="mb-3" name="vivienda" id="vivienda"/>
                    <br>
                    TARIFA
                    <input type="text" class="mb-3" name="tarifa" id="idTarifa"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="data.js"></script>
</body>
</html>
