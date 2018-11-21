$(function () {
    function loadMensajes() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var mensajes = JSON.parse(this.responseText);
                for (mensajeX in mensajes) {
                    let idSender = mensajes[mensajeX].idSender;
                    let mensaje = mensajes[mensajeX].mensaje;
                    let fechaEnviado = mensajes[mensajeX].fechaEnviado;

                    let item =
                        "<tr>" +
                        "<td value=" + idSender + " scope='row'>" + idSender + "</td>" +
                        "<td value=" + mensaje +" scope='row'>" + mensaje + "</td>" +
                        "<td value=" + fechaEnviado +" scope='row'>" + fechaEnviado + "</td>" +
                        "</tr>";
                    addToTable(item);
                }
                addToTable("</tbody>");
            }
        };
        xhttp.open("GET", "info/selectMensajes.php", true);
        xhttp.send();
    }

    function addToTable(item) {
        $("#llistaMensajes").append(item);
    }

    loadMensajes();
});
