$(function () {
    let t = $('#listaCasas').DataTable({
        dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        ajax: {
            url: 'info/selectViviendasFull.php',
            dataSrc: '',
            type: "POST",
        },
        responsive: true,
        columns: [
            {data: 'Name'},
            {data: 'HouseType'},
            {data: 'MaxPax'},
            {data: 'Street'},
            {data: 'City'},
            {data: 'CheckIn'},
            {data: 'CheckOut'},
            {data: 'StandardPrice'},
            {data: 'SquareMeters'},
            {
                render: function (data, type, row, meta) {
                    return `<button type='button' class='btn btn-info btn-block' data-toggle='modal' data-id="` + row['id'] + `" data-target='#viviendasEditModal'>Edit</button>`;
                },
                orderable: false,
                searchable: false
            }
        ],
        select: {
            style: 'single',
            selector: ':not(:last-child)',
            info: false
        },
        lengthChange: false,
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
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
        }
        ,
        columnDefs: [
            {responsivePriority: 1, targets: 0},
            {responsivePriority: 1, targets: -1},
        ],
    });
});

