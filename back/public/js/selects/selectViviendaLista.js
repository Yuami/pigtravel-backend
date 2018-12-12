$(function () {
        function loadViviendasLista() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var reserves = JSON.parse(this.responseText);

                    for (reserva in reserves) {
                        var idReserva = reserves[reserva].id;
                        var nomVivenda = reserves[reserva].vivienda;
                        var tipoVivienda = reserves[reserva].tipo;
                        var ciudadVivienda = reserves[reserva].ciudad;

                        var url = "houses/" + idReserva;
                        var newA = $("<a/>", {
                            href: url,
                            class: 'card col-8 align-self-center',
                            style: 'color: inherit; margin-left: 17%; text-decoration:none;'
                        });
                        var newCBody = $("<div/>", {class: 'card-body row'});
                        var newCImg = $("<div/>", {class: 'card-image col-4'});
                        var newI = $("<img/>", {src: "img/casas/house" + idReserva + ".jpg", style: 'max-width: 60%'});
                        var newCCont = $("<div/>", {class: 'row col-8 '});
                        var newHPN = $("<h6/>", {text: "Nom Casa", class: "font-weight-bold"});
                        var newHPC = $("<h6/>", {text: "Ciudad", class: "font-weight-bold"});
                        var newPN = $("<p/>", {text: newHPN + nomVivenda, class: 'col font-weight-bold  py-5 text-center'});
                        var newPC = $("<p/>", {
                            text: newHPC + ciudadVivienda,
                            class: 'col font-weight-bold py-5 text-center'
                        });
                        var newPM = $("<p/>", {text: "Mensajes", class: 'col font-weight-bold py-5 text-center'});

                        newCCont.append(newPN, newPC, newPM);
                        newCImg.append(newI);
                        newCBody.append(newCImg, newCCont);
                        newA.append(newCBody);
                        appendToLlista(newA);

                    }
                }
            }
            ;
            xhttp.open("GET", "info/selectViviendaLista.php", true);
            xhttp.send();
        }

        function appendToLlista(item) {
            $("#cardCasa").append(item);
        }

        loadViviendasLista();
    }
)
;
