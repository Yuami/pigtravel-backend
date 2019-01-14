let country = $('#country');
let city = $('#city');
let region = $('#region');
let loader = $("#loading");


function startLoading(msg = "Loading...") {
    loader.removeClass("d-none");
    loader.find("#loading-message").text(msg);
}

function stopLoading() {
    loader.addClass('d-none');
}

function fetchToSelect(url, id) {
    fetch(url)
        .then(r => r.json())
        .then(countries => {
                countries.forEach(c => addToLista(id, toOption(c.id, c.name)));
                stopLoading();
                if (id === "#country") {
                    loadRegion(country.select2('val'));
                } else if (id === "#region") {
                    loadCiudades(region.select2('val'));
                }
            }
        )
}

function loadPaises() {
    let url = "/api/paises";
    region.empty();
    city.empty();
    fetchToSelect(url, "#country");
}

function loadRegion(idRegionVivienda = "") {
    let url = "/api/region/" + idRegionVivienda;
    region.empty();
    city.empty();
    startLoading("Loading Regions");
    fetchToSelect(url, "#region");
}

function loadCiudades(idCiudadVivienda = "") {
    let url = "/api/ciudades/" + idCiudadVivienda;
    city.empty();
    startLoading("Loading Cities");
    fetchToSelect(url, "#city");

}

function toOption(value, content) {
    if (content.length > 0)
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
        loadRegion(country.select2('val'));
    });

    $('#region').on('change', function () {
        loadCiudades(region.select2('val'));
    });
});