$(function () {
    function loadViviendas() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var viviendas = JSON.parse(this.responseText);

                for (tipo in viviendas) {
                    let nombre = viviendas[tipo].nombre;
                    let item = "<a class='dropdown-item'>" + nombre + "</a>";
                    addToDropdown(item);
                }
            }
        };
        xhttp.open("GET", "info/selectTipoViviendas.php", true);
        xhttp.send();
    }

    function addToDropdown(item) {
        $("#dropdownidTipoVivienda").append(item);
    }


    $('.dropdown').on('click', '.dropdown-item', function () {
        $('.dropdown-toggle').html($(this).html());
    });


    loadViviendas();
});
