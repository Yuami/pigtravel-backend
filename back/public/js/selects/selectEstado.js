$(document).ready(function () {
    function loadEstat() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var estats = JSON.parse(this.responseText);
                for (i in estats) {
                    var nomEstat = estats[i].nombre;
                    var item = $("<option/>", {text: nomEstat});
                    $("#filterEst").append(item);
                }
            }
        };
        xhttp.open("GET", "info/selectEstado.php", true);
        xhttp.send();
    }

    loadEstat();
});