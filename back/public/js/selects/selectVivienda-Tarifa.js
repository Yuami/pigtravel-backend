let list = $('#list-group-vivienda-tarifa');
let response = fetch("/info/vivienda-tarifa.php");
let json = response.then(response => response.json());
let listItems = json.then(json => json.map(item => {
    let s = `Vivienda: ${item.vivienda} Tarifa: ${item.tarifa}`;
    return toListItem(s);
}));

listItems.then(items => list.append(items));

function toListItem(item) {
    return `<li class="list-group-item">${item}</li>`
}