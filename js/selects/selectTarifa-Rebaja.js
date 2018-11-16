const selectTarifa = $("#selectTarifa");
const selectRebaja = $("#selectRebaja");

function render(array, select, type) {
    select.empty();
    select.append("<option value=''>"+type+"...</option>");
    array.map(item => {
        let id = item.id;
        let option = "<option value='" + id + "'> " + type + " " + id + "</option>";
        select.append(option);
    });
}

async function renderSelect(url, select, type) {
    const response = await fetch(url);
    const items = await response.json();
    render(items, select, type);
}

let urlTarifa = "info/selectTarifas.php";
let urlRebaja = "info/selectRebajas.php";

selectTarifa.change(() => {
    let url = "info/selectRebajas.php";
    let value = $("#selectTarifa option:selected").attr("value");
    if (value != "" && value != undefined) {
        url += "?idTarifa=" + value;
    }
    renderSelect(url, selectRebaja, "Rebaja")
});

renderSelect(urlTarifa, selectTarifa, "Tarifa");
renderSelect(urlRebaja, selectRebaja, "Rebaja");