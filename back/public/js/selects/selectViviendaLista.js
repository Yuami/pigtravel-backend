$(function () {
    function loadViviendasLista() {
        var housesExist = false;

        fetch("/info/selectViviendaLista.php")
            .then(res => res.json())
            .then(houses =>
                houses.forEach(house => {
                    $("#firstHouse").hide();

                    let id = house.id;
                    let nom = house.vivienda;
                    let ciudad = house.ciudad;

                    let init = {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id,
                        })
                    };

                    fetch('/App/handlers/houseHandler.php', init)
                        .then(res => res.text())
                        .then(text => {
                            $("#firstHouse").hide();
                            let newCol = $("<div/>", {
                                class: 'col-md-4 col-xl-3 col-sm-6 mb-3'
                            });
                            let url = "houses/" + id;
                            let newA = $("<a/>", {
                                href: url,
                                class: 'card p-0',
                                style: 'color: inherit; text-decoration:none;'
                            });
                            let newCBody = $("<div/>", {class: 'card-body'});
                            let newCImg = $("<div/>", {class: 'view overlay '});
                            let newI = $("<img/>", {
                                class: 'card-img-top',
                                style: 'obtject-fit:cover; height:250px ; width:100%',
                                src: text
                            });
                            let newPN = $("<p/>", {text: nom, class: 'col font-weight-bold  text-center'});
                            let newPC = $("<p/>", {
                                text: ciudad,
                                class: 'col font-weight-bold text-center'
                            });
                            let newPM = $("<p/>", {text: "Mensajes", class: 'col font-weight-bold text-center'});
                            newCImg.append(newI);
                            newCBody.append(newPN, newPC, newPM);
                            newA.append(newCImg, newCBody);
                            newCol.append(newA);
                            appendToLlista(newCol);
                        });
                })
            );
    }

    function appendToLlista(item) {
        $("#cardCasa").append(item);
    }

    loadViviendasLista();
});

