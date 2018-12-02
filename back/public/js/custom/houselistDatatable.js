$(function () {
    $('#listaCasas').show();
    $('#listaCasas').DataTable({
        ajax: {
            url: 'info/selectViviendasFull.php',
            dataSrc: '',
            type: "POST",
        },
        columns: [
            {data: 'Name'},
            {data: 'HouseType'},
            {data: 'MaxPax'},
            {data: 'Street'},
            {data: 'City'},
            {data: 'CheckIn'},
            {data: 'CheckOut'},
            {data: 'StandardPrice'},
            {data: 'SquareMeters'}
        ],
        select: {
            style: 'single',
            info: false
        },
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
        }
    });
});

