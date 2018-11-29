
$(document).ready(function () {

    $("#example").one("preInit.dt", function () {
        $sel = $("<select></select>");
        $sel.html("<option value='-1'>Select Column</option>");
        $.each(columns, function (i, opt) {

            $sel.append("<option value='" + opt.title + "'>" + opt.title + "</option>");
        });
        $("#example_ddl").append($sel);

    });
   $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "info/selectMensajes.php",
                "type": "POST",
                "dataSrc": "records"

            },
            "columns": [
                {
                    "foto": "fotoPerfil",
                    "render": function (foto, type, row) {
                        return '<img src="' + foto + '" />';
                    }
                },
                { "data": "nombreSender" },
                { "data": "nombreCasa" },
                { "data": "mensaje" },
                { "data": "fechaEnviado" }
            ],
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "searching": false,
            "paging": false,
            "responsive": true,
            "info": false
        });
});