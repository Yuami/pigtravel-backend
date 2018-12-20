$(document).ready(function () {
    $("#filterViv").prop("disabled", true);
    $("#filterEst").change(function () {
        var Estado = $("#filterEst").val();
        $("#filterViv").prop("disabled", false);
        $("#filterViv").empty();
        loadVivienda(Estado);
    });

    function loadEstat() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var estats = JSON.parse(this.responseText);
                for (i in estats) {
                    var estado = estats[i].nomEstat;
                    var item = $("<option/>",
                        {
                            value: estado,
                            text: estado
                        })
                    ;
                    $("#filterEst").append(item);
                }
            }
        };
        xhttp.open("GET", "info/selectReservasList.php", true);
        xhttp.send();
    }

    function loadVivienda(estado) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var vivienda = JSON.parse(this.responseText);
                var item0 = $("<option/>", {
                    value: "0",
                    text: "--- Casa ---"
                });
                $("#filterViv").append(item0);
                for (i in vivienda) {
                    var nomV = vivienda[i].nom;
                    var item = $("<option/>", {
                        text: nomV
                    });
                    $("#filterViv").append(item);
                }
            }
        };
        xhttp.open("GET", "info/selectReservasList.php?vivienda=" + estado , true);
        xhttp.send();
    }

    loadEstat();
});