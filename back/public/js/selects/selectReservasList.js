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
                    console.log(row);
                    if (type === 'display') {
                        data = '<a href="/reservations/' + row['idVivienda'] + '"style="text-decoration: none; color: black ">' + data + '</a>';
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
        reset();
    });

    function reset() {
        var dropDownE = document.getElementById("filterEst");
        var dropDownV = document.getElementById("filterViv");
        dropDownE.selectedIndex = 0;
        dropDownV.selectedIndex = 0;
        dropDownV.attr('disabled', true);
    }
});