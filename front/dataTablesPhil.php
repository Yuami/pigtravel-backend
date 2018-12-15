<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/font-awesome.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/custom/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <title>List of houses</title>
</head>

<body>
<section class="container-fluid">
    <h1><a href="house.php">House</a></h1>
    <h1>Houses</h1>

    <div class="row">
        <div class="col">
            <table id="listaCasas" class="responsive table table-striped table-bordered nowrap" style="width: 100%;">
                <thead>
                <tr>
                    <th>House</th>
                    <th>Tipo Vivienda</th>
                    <th>Capacity</th>
                    <th>Street</th>
                    <th>Ciudad</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Alquiler Automatico</th>
                    <th>Square Meters</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modify House</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Id de la casa:</label>
                                <input type="text" name="viviendaID" id="viviendaID" disabled/>
                            </div>
                            <div class="col-md-6">
                                <label>Nombre:</label>
                                <input type="text" name="nombreModal" id="nombreModal"/>
                            </div>
                            <div class="col-md-6">
                                <label>House Type:</label>
                                <input type="text" name="typeModal" id="typeModal" />
                            </div>
                            <div class="col-md-6">
                                <label>Capacity:</label>
                                <input type="text" name="capacityModal" id="capacityModal" />
                            </div>
                            <div class="col-md-6">
                                <label>Street:</label>
                                <input type="text" name="streetModal" id="streetModal"/>
                            </div>
                            <div class="col-md-6">
                                <label>Ciudad:</label>
                                <input type="text" name="ciudadModal" id="ciudadModal" />
                            </div>
                            <div class="col-md-6">
                                <label>Check In:</label>
                                <input type="text" name="checkInModal" id="checkInModal"/>
                            </div>
                            <div class="col-md-6">
                                <label>Check Out:</label>
                                <input type="text" name="checkOutModal" id="checkOutModal" />
                            </div>
                            <div class="col-md-6">
                                <label>Alquiler Automatico:</label>
                                <input type="text" name="aaModal" id="aaModal" />
                            </div>
                            <div class="col-md-6">
                                <label>Square Meters:</label>
                                <input type="text" name="squareModal" id="squareModal"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="modalSubmit" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viviendasEditModal" tabindex="-1" role="dialog" aria-labelledby="viviendasEditModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify House</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="viviendaID" id="viviendaID" disabled/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Tipo Viviendas
        </button>
        <div class="dropdown-menu" id="dropdownidTipoVivienda">
        </div>
    </div>

    <div class="input-group mb-3">
        <select class="custom-select" id="selectVendedor">
            <option selected>Vendedor...</option>
        </select>
        <select class="custom-select" id="selectCasas">
            <option selected>Tipo de Casa...</option>
        </select>
    </div>

    <table class="table table-striped" id="listadoViviendas">

    </table>

    <div id="llistaReserves">

    </div>

    <ul class="list-group">
        <li class="list-group-item">Bed and breakfast chill house</li>
        <li class="list-group-item">B&B your home</li>
        <li class="list-group-item">Chill and resort</li>
        <li class="list-group-item">Casa con buenas vistas</li>
        <li class="list-group-item">Casa Blanca</li>
        <li class="list-group-item">Casa Paraiso</li>
    </ul>

</section>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/selects/selectTipoVivienda.js"></script>
<script src="js/selects/selectViviendaLista.js"></script>
<script src="js/selects/selectViviendas.js"></script>
<script src="js/selects/selectVendedorsViviendas.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

<script src="js/houselistDatatable.js"></script>
</body>
</html>