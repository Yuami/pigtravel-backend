$(document).ready(function () {
    $('#reservaList').DataTable({
        ajax: "info/selectReservasList.php",
        columns: [
            {data: "nomVivienda"},
            {data: "nomPersona"},
            {data: "nomEstat"},
            {data: "fechaReserva"},
            {data: "precio"}
        ]
    });
});