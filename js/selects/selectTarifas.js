const selectTarifa = $("#selectTarifa");
const selectRebaja = $("#selectRebaja");

function render(array, select, type) {
    select.empty();
    array.map(item => {
        let id = item.id;
        let option = "<option value='" + id + "'> "+ type + id + "</option>";
        select.append(option);
    });
}

async function renderSelect(url, select, type) {
    const response = await fetch(url);
    const items = await response.json();
    render(items, select, type);
}

let value = $("#selectRebaja option:selected").val();
console.log(value);
let urlTarifa = "info/selectTarifas.php";
let urlRebaja = "info/selectRebajas.php"+value;

renderSelect(urlTarifa, selectTarifa, "Tarifa");
selectTarifa.change(renderSelect(urlRebaja, selectRebaja, "Rebaja")) ;
