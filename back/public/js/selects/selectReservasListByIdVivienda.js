$(document).ready(function() {
    $('#reservaList').DataTable( {
        ajax: "info/selectReservasList.php",
        columns: [
            { data: "nomVivienda" },
            { data: "nom" },
            { data: "office" },
            { data: "extn" },
            { data: {
                    _:    "start_date.display",
                    sort: "start_date.timestamp"
                } },
            { data: "salary" }
        ]
    } );
} );