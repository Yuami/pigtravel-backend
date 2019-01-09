$(document).ready(function () {
    var t = $('#taula').DataTable({

        ajax: {
            url: 'info/selectReservasList.php',
            dataSrc: '',
            type: "GET",
        },
        columns: [
            {
                data: "nomVivienda",
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        data = '<a href="/reservations/1" style="text-decoration: none; color: black ">' + data + '</a>';
                    }

                    return data;
                }
            },
            {data: 'nomPersona'},
            {data: 'nomEstat'},
            {data: 'fechaReserva'},
            {data: 'preu'}
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
        },
        lengthChange: false,
        paging: false,
        ordering: false,
        info: false,
        searching: true,
        dom: 'lrtip'
    });

    $('#filterEst').on('change', function () {
        t.search(this.value).draw();
    });
    $('#clean').on('click', function () {
        t.search('').columns().search('').draw();
    });
});