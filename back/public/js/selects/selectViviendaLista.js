$(function () {
        function loadViviendasLista() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var houses = JSON.parse(this.responseText);

                    for (house in houses) {

                        var idVivienda = houses[house].id;
                        var nomVivenda = houses[house].vivienda;
                        var ciudadVivienda = houses[house].ciudad;

                        let init = {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: idVivienda,
                            })
                        };

                        fetch('houseHandler.php', init)
                            .then(function (res) {
                                res.text()
                            })
                            .then(function (text) {
                                console.log(text);
                                var url = "houses/" + idVivienda;
                                var newA = $("<a/>", {
                                    href: url,
                                    class: 'card col-3 m-2 p-0',
                                    style: 'color: inherit; text-decoration:none;max-width:100%'
                                });
                                var newCBody = $("<div/>", {class: 'card-body'});
                                var newCImg = $("<div/>", {class: 'view overlay'});
                                var newI = $("<img/>", {class: 'card-img-top', src: text});
                                var newPN = $("<p/>", {text: nomVivenda, class: 'col font-weight-bold  text-center'});
                                var newPC = $("<p/>", {
                                    text: ciudadVivienda,
                                    class: 'col font-weight-bold text-center'
                                });
                                var newPM = $("<p/>", {text: "Mensajes", class: 'col font-weight-bold text-center'});
                                newCImg.append(newI);
                                newCBody.append(newPN, newPC, newPM);
                                newA.append(newCImg, newCBody);
                                appendToLlista(newA);
                            })
                    }
                }
            };
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
