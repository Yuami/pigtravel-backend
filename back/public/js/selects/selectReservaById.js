$(document).ready(function () {

    function loadCardsCasa() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var casa = JSON.parse(this.responseText);
                var i = 0;
                for (x in casa) {

                    if (i % 2 == 0) {
                        var rowDIV = $("<div/>", {
                            class: "row",
                        });
                        $("#cardscasa").append(rowDIV);
                    }
                    i++;

                    var id = casa[x].id;
                    var nom = casa[x].fechaReserva;
                    var foto = "img/casas/house" + casa[x].idVivienda + ".jpg";
                    var preu = casa[x].precio + " €";
                    var url = "info/selectReservaById.php?id=" + id;

                    var colDIV = $("<div/>", {
                        class: "col-sm-6"
                    });
                    var cardDIV = $("<div/>", {
                        class: "card"
                    });
                    var cardIMG = $("<img/>", {
                        class: "card-img-top",
                        src: foto,
                        alt: "card image",
                        style: "width:100%"
                    });
                    cardDIV.append(cardIMG);
                    var cardBody = $("<div/>", {
                        class: "card-body"
                    });
                    var cardH4 = $("<h4/>", {
                        class: "card-title",
                        text: nom
                    });
                    var cardP = $("<p/>", {
                        class: "card-text",
                        text: preu
                    });
                    var cardA = $("<a/>", {
                        class: "btn btn-primary",
                        href: url,
                        text: "Reservar"
                    });
                    cardBody.append(cardH4, cardP, cardA);
                    cardDIV.append(cardBody);
                    //var br = $("<br/>");
                    colDIV.append(cardDIV);
                    rowDIV.append(colDIV);
                }
            }
        };
        xhttp.open("GET", "info/selectReservaById.php", true);
        xhttp.send();
    }

    loadCardsCasa();

});