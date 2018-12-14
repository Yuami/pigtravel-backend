$(function () {
        function loadViviendasLista() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var reserves = JSON.parse(this.responseText);

                    for (reserva in reserves) {
                        var idReserva = reserves[reserva].id;
                        var nomVivenda = reserves[reserva].vivienda;
                        var ciudadVivienda = reserves[reserva].ciudad;

                        var url = "houses/" + idReserva;
                        var newA = $("<a/>", {
                            href: url,
                            class: 'card col-3 m-2 p-0',
                            style: 'color: inherit; text-decoration:none;max-width:100%'
                        });
                        var newCBody = $("<div/>", {class: 'card-body'});
                        var newCImg = $("<div/>", {class: 'view overlay'});
                        var newI = $("<img/>", {class: 'card-img-top', src: "img/casas/house" + idReserva + ".jpg"});
                        var newPN = $("<p/>", {text: nomVivenda, class: 'col font-weight-bold  text-center'});
                        var newPC = $("<p/>", {
                            text: ciudadVivienda,
                            class: 'col font-weight-bold text-center'
                        });
                        var newPM = $("<p/>", {text: "Mensajes", class: 'col font-weight-bold text-center'});
                        newCImg.append(newI);
                        newCBody.append(newPN,newPC,newPM);
                        newA.append(newCImg, newCBody);
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
