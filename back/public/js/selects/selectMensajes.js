$(document).ready(function () {
    $("#mobilebutton").click(function () {

        if ($('.openBtn').attr('data-leido') == 0) {
        }
        $(this)
            .find('[id="icon"]').toggleClass('fa-eye-slash').toggleClass('fa-eye');
    });

    $('.openBtn').on('click', function () {
        leido = $(this).attr('data-leido');
        idMensaje = $(this).attr('id');
        nomPersona = $(this).attr('data-to');
        idVivienda = $(this).attr('data-id-viv');
        idReciever = $(this).attr('data-id');
        $('#nombreReciever').empty();
        $('#nombreReciever').append('Para: <b>' + nomPersona + '</b>');
        $('#nombreReciever').append('<input type="hidden" name="idVivienda" value="' + idVivienda + '">');
        if (leido == 1) {
            $('#nombreReciever').append('<input type="hidden" name="leido" value="' + idMensaje + '">');
        }
        $('#nombreReciever').append('<input type="hidden" name="idReciever" value="' + idReciever + '">');
        $('#myModal').modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        });
    });
});

function myNewFunction(sel) {
    var val = sel.options[sel.selectedIndex].value;
    if (val == 0) {
        $("tr").show();

    } else {
        $("tr").hide();
        $("tr[id=" + val + "]").show();
    }
}
