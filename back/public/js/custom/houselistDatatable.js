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
            {data: 'CheckIn'}
        ]
    });
});

