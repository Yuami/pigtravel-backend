$(function () {
    var botonLeido = false;
    var mensajesEnviados = false;
    var viviendaID=null;

    $("#botonEnviado").click(function () {
        $(".cardMessages").remove();
        if (mensajesEnviados == false) {
            mensajesEnviados = true;
        } else {
            mensajesEnviados = false;
        }
    });
    $("#botonLeido").click(function () {
        $(".cardMessages").remove();

        if (botonLeido == false) {
            botonLeido = true;
        } else {
            botonLeido = false;
        }
      loadCardsMensajes(botonLeido, viviendaID, mensajesEnviados);

    });
    document.getElementById("listaViviendas").onchange = function () {
        $(".cardMessages").remove();
        viviendaID = this.value;
        botonLeido = false;
        if (viviendaID == -1) {
            loadCardsMensajes(false, null, false);
        } else {
            loadCardsMensajes(botonLeido, viviendaID, mensajesEnviados);
        }

    };
});