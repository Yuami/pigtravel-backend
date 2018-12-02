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
        paging: true,
        ordering: false,
        info: true,
        searching: true,
        dom: 'lrtip'
    });

    $('#filterEst').on('change', function () {
        t.search(this.value).draw();
    });
    $('#clean').on('click', function(){
        t.search( '' ).columns().search( '' ).draw();
    });
});