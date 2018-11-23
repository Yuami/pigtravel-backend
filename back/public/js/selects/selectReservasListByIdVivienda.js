$(document).ready(function () {
    function loadReservaList() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 & this.status == 200) {
                var reserva = JSON.parse(this.responseText);
                for (i in reservas) {

                    var nomVivienda = reserva[i].nomVivienda;
                    var nomPersona = reserva[i].nomPersona;
                    var estat = reserva[i].nomEstat;
                    var fecha = reserva[i].fechaReserva;
                    var preu = reserva[i].precio;
                    var newTr = $("<tr/>");

                    for (x in reserva.length) {
                        var newTd = $("<td/>");
                        switch (x) {
                            case 0:
                                var newI = $("<i>" + nomVivienda + "<i/>", {
                                    class: "fas fa-home"
                                };
                                newTd.append(newI);
                                break;
                            case 1:
                                var newH = $("<h6>" + "Nom:" + "</h6>");
                                var newP = $("<p>" + nomVivienda + "</p>", {
                                    class: font-weight-bold
                                });
                                newTd.append(newH, newP);
                                break;
                            case 2:
                                var newH = $("<h6>" + "Usuari:" + "</h6>");
                                var newP = $("<p>" + nomPersona + "</p>", {
                                    class: font-weight-bold
                                });
                                newTd.append(newH, newP);
                                break;
                            case 3:
                                var newH = $("<h6>" + "Estat:" + "</h6>");
                                var newP = $("<p>" + estat + "</p>", {
                                    class: font-weight-bold
                                });
                                newTd.append(newH, newP);
                                break;
                            case 4:
                                var newH = $("<h6>" + "Data Reserva:" + "</h6>");
                                var newP = $("<p>" + fecha + "</p>", {
                                    class: font-weight-bold
                                });
                                newTd.append(newH, newP);
                                break;
                            case 5:
                                var newH = $("<h6>" + "Preu:" + "</h6>");
                                var newP = $("<p>" + preu + "</p>", {
                                    class: font-weight-bold
                                });
                                newTd.append(newH, newP);
                                break;
                            case 6:
                                var newPM = $("<p>" + "Missatge: " + "</p>")
                                var newSpanC = $("<span>" + "N" + "</span>",)
                                var newSpan = $("<span/>");
                                var newI = $("<i>" + "Missatges" + "</i>", {
                                    class: far fa-envelope
                                });
                                newSpan.append(newI);
                                newTd.append(newPm, newSpanC, newSpan);
                                break;
                        }
                    }
                    newTr.append(newTd);
                    addTbody(newTr);
                }
            }
        };
        xhttp.open("GET", "info/selecReservaList.php", true);
        xhttp.send();
    }

    function addTbody(tr) {
        $("#reservaList").append(tr);
    }

    loadReservaList();
});