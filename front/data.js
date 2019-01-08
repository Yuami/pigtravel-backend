$(function () {
    t = $('#listaCasas').DataTable({
        dom: "Bpftipr",
        ajax: {
            url: 'vivienda-tarifa.php',
            dataSrc: '',
            type: "POST",
        },
        responsive: true,
        columns: [
            {data: 'vivienda'},
            {data: 'tarifa'},
            {
                render: (data, type, row, meta) =>
                    `<button type='button' class='btn btn-info btn-block edit' data-toggle='modal' data-id="` + row['id'] + `" data-target='#viviendasEditModal'>Editar</button>`,
                orderable: false,
                searchable: false
            }
        ],
        select: {
            style: 'single',
            selector: ':not(:last-child)',
            info: false
        },
        buttons: [{
            extend: 'excel',
            exportOptions: {
                columns: 'th:not(:last-child)'
            }
        },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
        }
        ,
        columnDefs: [
            {responsivePriority: 1, targets: 0},
            {responsivePriority: 1, targets: -1},
        ],
    });

    let lastTarifa;
    $(document).on("click", ".edit", function () {
        let data = t.row($(this).parents('tr')).data();
        let viviendaID = $("#viviendaID");
        let vivienda = $("#vivienda");
        let tarifa = $("#idTarifa");

        viviendaID.val(data['id']);
        vivienda.val(data['vivienda']);
        tarifa.val(data['tarifa']);
        lastTarifa = tarifa.val();
    });

    $('#guardar').click(() => {
        let id = $('#viviendaID');
        let vivienda = $('#vivienda');
        let tarifa = $('#idTarifa');

        let init = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id.val(),
                vivienda: vivienda.val(),
                tarifa: tarifa.val(),
                lastTarifa: lastTarifa
            })
        };
        fetch('safeViviendaTarifa.php', init).then(res => console.log(res.text()));
    });

    $('#borrar').click(() => {
        let id = $('#viviendaID');
        let init = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id.val(),
            })
        };
        fetch('deleteViviendaTarifa.php', init).then(res => console.log(res.text()));
    });

});