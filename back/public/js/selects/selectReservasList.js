$(document).ready(function () {
    var t = $('#taula').DataTable({
        ajax: {
            url: 'info/selectReservasList.php',
            dataSrc: '',
            type: "GET",
        },
        columns: [
            {data: 'nomVivienda'},
            {data: 'nomPersona'},
            {data: 'nomEstat'},
            {data: 'fechaReserva'},
            {data: 'preu'}
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
        },
        select: true,
        dom: 'lrtip'
    });

    $('#table-filter').on('change', function () {
        table.search(this.value).draw();
    });
});