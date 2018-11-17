$(function () {

    function loadVendedores() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var vendedores = JSON.parse(this.responseText);
                for (tipos in vendedores) {
                    var idVendedor = vendedores[tipos].idPersona;
                    var nombreVendedor = vendedores[tipos].nombre;

                    var item = $("<option/>", {value: idVendedor, text: nombreVendedor});
                    $("#selectVendedor").append(item);
                }
            }
        };
        xhttp.open("GET", "info/selectVendedors.php", true);
        xhttp.send();
    }

    $("#selectVendedor").change(
        function loadCasasVendedor() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var vendedores = JSON.parse(this.responseText);
                    $("#selectCasas").empty();
                    for (tipos in vendedores) {
                        var idVendedor = vendedores[tipos].idPersona;
                        var nombreVendedor = vendedores[tipos].nombre;

                        var item = $("<option/>", {value: idVendedor, text: nombreVendedor});
                        $("#selectCasas").append(item);
                    }
                }
            };
            xhttp.open("GET", "info/selectCasas.php?idVendedor=" + $("#selectVendedor option:selected").val(), true);
            console.log($("#selectVendedor option:selected").val());
            xhttp.send();
        });

    loadVendedores();
});