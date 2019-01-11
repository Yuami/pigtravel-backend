function loadLocalidades(idCiudadVivienda = null) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var localidades = JSON.parse(this.responseText);
            addToLista('<option disabled>-- Select an option --</option>');
            console.log(localidades);
            for (tipo in localidades) {
                let item;
                let nombre = localidades[tipo].name;
                let idCiudad = localidades[tipo].id;
                if (idCiudad == idCiudadVivienda) {
                    item = "<option value=" + idCiudad + " selected>" + nombre + "</option>";
                } else {
                    item = "<option value=" + idCiudad + ">" + nombre + "</option>";
                }
                addToLista(item);
            }
        }
    };
    xhttp.open("GET", "/info/selectLocalidades.php", true);
    xhttp.send();
}

function addToLista(item) {
    $("#city").append(item);
}
