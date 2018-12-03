$(function () {
    function loadCardsMensajes() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var mensajeX = JSON.parse(this.responseText);
                var i = 0;
                var ccard="";
                for (x in mensajeX) {

                        var rowDIV = $("<div />", {
                            class: "card cardMessages",
                        });
                        $("#cardsmensajes").append(rowDIV);


                    var nombre = mensajeX[x].nombreSender;
                    var nombreCasa = mensajeX[x].nombreCasa;
                    var mensaje = mensajeX[x].mensaje;
                    var fechaEnviado = mensajeX[x].fechaEnviado;
                    var leido = mensajeX[x].leido;

                    if(leido==1) {
                        ccard =
                            "<div class='card-body missatge'>" +
                            "<div class='row'>" +
                            "<div class='col-md-4'>" + nombre + "</div>" +
                            "<div class='col-md-6'>" + mensaje + "</div>" +
                            "<div class='col-md-2'>" + fechaEnviado + "</div>" +
                            "</div>" +
                            "<div class='row'>" +
                            "<div class='col-md-3'>" + nombreCasa + "</div>" +
                            "</div>" +
                            "</div>";
                    }else{
                        ccard =
                        "<div class='card-body missatge'>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><b>" + nombre + "</b></div>" +
                        "<div class='col-md-6'><b>" + mensaje + "</b></div>" +
                        "<div class='col-md-2'><b>" + fechaEnviado + "</b></div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-3'><b>" + nombreCasa + "</b></div>" +
                        "</div>" +
                        "</div>";
                    }
                    rowDIV.append(ccard);

                }

            }
        };
        xhttp.open("GET", "info/selectMensajes.php", true);
        xhttp.send();
    }

    loadCardsMensajes();


    $("#botonLeido").click( function() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var mensajeX = JSON.parse(this.responseText);
                var i = 0;
                var ccard="";
                $(".cardMessages").empty();
                for (x in mensajeX) {

                    if (i % 2 == 0) {
                        var rowDIV = $("<div />", {
                            class: "card cardMessages",
                        });
                        $("#cardsmensajes").append(rowDIV);
                    }
                    i++;

                    var nombre = mensajeX[x].nombreSender;
                    var nombreCasa = mensajeX[x].nombreCasa;
                    var mensaje = mensajeX[x].mensaje;
                    var fechaEnviado = mensajeX[x].fechaEnviado;
                    var leido = mensajeX[x].leido;

                    if(leido==0) {
                        ccard =
                            "<div class='card-body missatge'>" +
                            "<div class='row'>" +
                            "<div class='col-md-4'>" + nombre + "</div>" +
                            "<div class='col-md-6'>" + mensaje + "</div>" +
                            "<div class='col-md-2'>" + fechaEnviado + "</div>" +
                            "</div>" +
                            "<div class='row'>" +
                            "<div class='col-md-3'>" + nombreCasa + "</div>" +
                            "</div>" +
                            "</div>";
                    }else{
                        ccard ="";
                    }
                    rowDIV.append(ccard);

                }

            }
        };
        xhttp.open("GET", "info/selectMensajes.php", true);
        xhttp.send();


            }


    );

});