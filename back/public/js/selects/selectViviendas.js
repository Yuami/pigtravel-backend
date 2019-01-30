$(function () {
    function loadViviendas() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var viviendas = JSON.parse(this.responseText);
                addToTable("<thead>" +
                    "<tr>" +
                    "<th scope='col'>Vivienda</th>" +
                    "<th scope='col'>Calle</th>" +
                    "<th scope='col'>Tipo Vivienda</th>" +
                    "<th scope='col'>Cities</th>" +
                    "</tr>" + "</thead><tbody>"
                );

                for (casa in viviendas) {
                    let idVivienda = viviendas[casa].id;
                    let nombreVivienda = viviendas[casa].nombre;
                    let calleVivienda = viviendas[casa].calle;
                    let idTipoVivienda = viviendas[casa].idTipoVivienda;
                    let idCiudad = viviendas[casa].idCiudad;

                    let item =
                        "<tr>" +
                        "<td value=" + nombreVivienda + " scope='row'>" + nombreVivienda + "</td>" +
                        "<td value=" + calleVivienda +" scope='row'>" + calleVivienda + "</td>" +
                        "<td value=" + idTipoVivienda +" scope='row'>" + idTipoVivienda + "</td>" +
                        "<td value=" + idCiudad +" scope='row'>" + idCiudad + "</td>" +
                        "</tr>";
                    addToTable(item);
                }
                addToTable("</tbody>");
            }
        };
        xhttp.open("GET", "info/selectViviendas.php", true);
        xhttp.send();
    }

    function addToTable(item) {
        $("#listadoViviendas").append(item);
    }

    loadViviendas();
});
