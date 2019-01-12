let country = $('#country');
let city = $('#city');
let region = $('#region');

function loadPaises() {
    let url = "/api/paises";

    fetch(url)
        .then(r => r.json())
        .then(countries => countries.forEach(c => addToLista("#country", toOption(c.id, c.name))));
    loadCiudades()
}

function loadRegion(idRegionVivienda = "") {
    let url = "/api/region/" + idRegionVivienda;
    region.empty();
    fetch(url)
        .then(r => r.json())
        .then(cities => cities.forEach(c => addToLista("#city", toOption(c.id, c.name))));
    loadCiudades();
}

function loadCiudades(idCiudadVivienda = "") {
    let url = "/api/ciudades/" + idCiudadVivienda;
    city.empty();
    fetch(url)
        .then(r => r.json())
        .then(cities => cities.forEach(c => addToLista("#city", toOption(c.id, c.name))));
}

function toOption(value, content) {
    return `<option value="${value}">${content}</option>`;
}

function addToLista(selector, item) {
    $(selector).append(item);
}

$(function () {
    country.select2();
    region.select2();
    city.select2();

    $('#country').on('change', function () {
        loadRegion(this.value);
    });

    $('#region').on('change', function () {
        loadCiudades(this.value);
    });
});