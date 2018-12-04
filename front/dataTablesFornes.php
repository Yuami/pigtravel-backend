<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/font-awesome.js"></script>
    <script src="js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

</head>
<body>
<section id="tables">
    <div class="container">
        <h1>Table</h1>
        <div class="row mt-5">
            <button id="normal" class="btn btn-primary ml-1">Normal</button>
            <button id="idOut" class="btn btn-primary ml-1">ID Out</button>
            <button id="idioma" class="btn btn-primary ml-1">Idioma</button>
            <button id="selectbtn" class="btn btn-primary ml-1">Select row</button>
            <button id="edit" class="btn btn-primary ml-1">Edit table</button>
        </div>
        <div class="form-group">
            <label for="select">Example select</label>
            <select class="form-control" id="select">
                <option value="0">ID</option>
                <option value="1">Nombre</option>
            </select>
        </div>
        <div id="table-container">
            <table id="taula" class="table table-striped table-bordered my-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                </tr>
                </thead>
            </table>
        </div>

        <h1>Edit row</h1>
        <table id="taula6" class="table table-striped table-bordered my-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
            </thead>
        </table>
    </div>
</section>
<script src="data.js"></script>
</body>
</html>