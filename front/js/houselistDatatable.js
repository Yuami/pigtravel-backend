$(function () {
    t = $('#listaCasas').DataTable({
        dom: "Bftrip",
        ajax: {
            url: 'selectViviendasFull.php',
            dataSrc: '',
            type: "POST",
        },
        columns: [
            {data: 'nombre'},
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
                    return `<button type='button' class='editbutton btn btn-info btn-block' data-toggle='modal' data-id="` + row['id'] + `" data-target='#viviendasEditModal'>Edit</button>
                            <button type='button' class='deletebutton btn btn-danger btn-block' data-toggle='modal' data-id="\` + row['id'] + \`">Delete</button>`;
                },
                orderable: false,
                searchable: false
            }
        ],
        select: {
            style: 'single',
            selector: 'td:not(:last-child)',
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
            },
            {
                extend: 'print',
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

    $(document).on("click", ".editbutton", function () {
        var data = t.row($(this).parents('tr')).data();
        $(".modal-body #viviendaID").val(data['id']);
        idModal = data['id']
        $(".modal-body #nombreModal").val(data['nombre']);
        nombreModal = data['nombre'];

        $(".modal-body #typeModal").val(data['HouseType']);
        $(".modal-body #capacityModal").val(data['MaxPax']);
        $(".modal-body #streetModal").val(data['Street']);
        $(".modal-body #ciudadModal").val(data['City']);
        $(".modal-body #checkInModal").val(data['CheckIn']);
        $(".modal-body #checkOutModal").val(data['CheckOut']);
        $(".modal-body #aaModal").val(data['StandardPrice']);
        $(".modal-body #squareModal").val(data['SquareMeters']);
    });

    $(document).on("click", ".deletebutton", function () {
        var data = t.row($(this).parents('tr')).data();
        var id = data['id'];
        console.log(id);
        let init = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id,
            })
        };
        fetch('deleteViviendasFull.php', init).then(res => console.log(res.text()));
    });

    $(document).on("click", "#modalSubmit", function () {
        var idModal, nombreModal;
        idModal = $("#viviendaID").val();
        nombreModal = $("#nombreModal").val();

        let init = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: idModal,
                nombre: nombreModal,
            })
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "deleteViviendasFull.php",
            data: id,
            success: function (result) {
                var json = $.parseJSON(result);
                if (json.response.status == 'success') {
                    alert("error")
                } else {
                    alert("error")
                }
            }
        });
    });
});