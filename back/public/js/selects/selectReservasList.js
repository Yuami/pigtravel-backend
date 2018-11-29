$(document).ready(function () {
    function loadReservaList() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 & this.status == 200) {
                var reserva = JSON.parse(this.responseText);
                for (i in reserva) {

                    var nomVivienda = reserva[i].nomVivienda;
                    var nomPersona = reserva[i].nomPersona;
                    var estat = reserva[i].nomEstat;
                    var fecha = reserva[i].fechaReserva;
                    var preu = reserva[i].preu;

                    var newTr = $("<tr/>");

                    var newTd0 = $("<td/>");
                    var newI0 = $("<i/>", {
                        class: "fas fa-home"
                    });
                    newTd0.append(newI0);
                    newTr.append(newTd0);
                    var newTd1 = $("<td/>");
                    var newH1 = $("<h6/>", {
                        text: "Nom:"
                    });
                    var newP1 = $("<p/>", {
                        text: nomVivienda
                    });
                    newTd1.append(newH1, newP1);
                    newTr.append(newTd1);
                    var newTd2 = $("<td/>");
                    var newH2 = $("<h6/>", {
                        text: "Usuari:"
                    });
                    var newP2 = $("<p/>", {
                        text: nomPersona
                    });
                    newTd2.append(newH2, newP2);
                    newTr.append(newTd2);
                    var newTd3 = $("<td/>");
                    var newH3 = $("<h6/>", {
                        text: "Estat:"
                    });
                    var newP3 = $("<p/>", {
                        text: estat
                    });
                    newTd3.append(newH3, newP3);
                    newTr.append(newTd3);
                    var newTd4 = $("<td/>");
                    var newH4 = $("<h6/>", {
                        text: "Preu:"
                    });
                    var newP4 = $("<p/>", {
                        text: preu,
                        class: "text-danger font-weight-bold"
                    });
                    newTd4.append(newH4, newP4);
                    newTr.append(newTd4);
                    var newTd5 = $("<td/>");
                    var newH5 = $("<h6/>", {
                        text: "Data Reserva:"
                    });
                    var newP5 = $("<p/>", {
                        text: fecha
                    });
                    newTd5.append(newH5, newP5);
                    newTr.append(newTd5);
                    var newTd6 = $("<td/>");
                    var newP6 = $("<p/>", {
                        id: "missatge",
                        class: "font-weight-bold",
                        text: "Misstge: "
                    });
                    var newSpan6 = $("<span/>", {
                        text: "N"
                    });
                    var newSpan62 = $("<span/>");
                    var newI6 = $("<i/>", {
                        class: "far fa-envelop"
                    });
                    newSpan62.append(newI6);
                    newSpan6.append(newSpan62);
                    newP6.append(newSpan6);
                    newTd6.append(newP6);
                    newTr.append(newTd6);
                    addTbody(newTr);
                }
            }
        };
        xhttp.open("GET", "info/selectReservasList.php", true);
        xhttp.send();

    }


    function addTbody(tr) {
        $("#reservaList").append(tr);
    }

    loadReservaList();
});