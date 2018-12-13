$(function () {
    var botonLeido = false;
    var mensajesEnviados = false;
    var viviendaID=null;

    function loadCardsMensajes(botonLeido, viviendaId, mensajesEnviados) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var mensajeX = JSON.parse(this.responseText);

                var ccard = "";
                for (x in mensajeX) {
                    var idReciever = mensajeX[x].idReciever;
                    var rowDIV = $("<div />", {
                        class: "card cardMessages",
                        onclick: "location.href='messaging.php?receiver_id="+idReciever+"'"
                    });
                    $("#cardsmensajes").append(rowDIV);


                    var nombre = mensajeX[x].nombreSender;
                    var nombreCasa = mensajeX[x].nombreCasa;
                    var mensaje = mensajeX[x].mensaje;
                    var fechaEnviado = mensajeX[x].fechaEnviado;
                    var leido = mensajeX[x].leido;

                    if (botonLeido == true) {
                        if (leido == 1) {
                            ccard =
                                "<div class='card-body missatgeCard'>" +
                                "<div class='row'>" +
                                "<div class='col-md-4'>" + nombre + "</div>" +
                                "<div class='col-md-6'>" + mensaje + "</div>" +
                                "<div class='col-md-2'>" + fechaEnviado + "</div>" +
                                "</div>" +
                                "<div class='row'>" +
                                "<div class='col-md-5'>" + nombreCasa + "</div>" +
                                "</div>" +
                                "</div>";
                        } else {
                            ccard = "";
                        }
                    } else {
                        if (leido == 1) {
                            ccard =
                                "<div class='card-body missatgeCard'>" +
                                "<div class='row'>" +
                                "<div class='col-md-4'>" + nombre + "</div>" +
                                "<div class='col-md-6'>" + mensaje + "</div>" +
                                "<div class='col-md-2'>" + fechaEnviado + "</div>" +
                                "</div>" +
                                "<div class='row'>" +
                                "<div class='col-md-5'>" + nombreCasa + "</div>" +
                                "</div>" +
                                "</div>";
                        } else {
                            ccard =
                                "<div class='card-body missatgeCard'>" +
                                "<div class='row'>" +
                                "<div class='col-md-4'><b>" + nombre + "</b></div>" +
                                "<div class='col-md-6'><b>" + mensaje + "</b></div>" +
                                "<div class='col-md-2'><b>" + fechaEnviado + "</b></div>" +
                                "</div>" +
                                "<div class='row'>" +
                                "<div class='col-md-5'><b>" + nombreCasa + "</b></div>" +
                                "</div>" +
                                "</div>";
                        }
                    }
                    rowDIV.append(ccard);

                }

            }
        };
        if(mensajesEnviados==true){
           var enviados="Enviados";
        }else{
            enviados="";
        }
        if (viviendaId != null) {
            xhttp.open("GET", "info/selectMensajes"+enviados+".php?idVivienda=" + viviendaId + "?enviados=" + mensajesEnviados, true);
            xhttp.send();
        } else {
            xhttp.open("GET", "info/selectMensajes"+enviados+".php?enviados="+ mensajesEnviados, true);
            xhttp.send();
        }
    }

    loadCardsMensajes(botonLeido,viviendaID,mensajesEnviados);
    $("#botonEnviado").click(function () {
        $(".cardMessages").remove();
        if (mensajesEnviados == false) {
            mensajesEnviados = true;
        } else {
            mensajesEnviados = false;
        }
        loadCardsMensajes(botonLeido, viviendaID, mensajesEnviados);
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

    $("button").click(function(){
        $(this).find("i").removeClass("fa-eye-slash").addClass("fa-eye");
    });

    function loadViviendasDropdown() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var viviendas = JSON.parse(this.responseText);
                for (x in viviendas) {
                    var nomVivenda = viviendas[x].vivienda;
                    var viviendaId = viviendas[x].id;
                    dropd = "<option value=" + viviendaId + ">" + nomVivenda + "</option>";
                    $("#listaViviendas").append(dropd);
                }
            }
        };
        xhttp.open("GET", "info/selectViviendaLista.php", true);
        xhttp.send();
    }

    loadViviendasDropdown();
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