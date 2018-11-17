let lPolCancel = $('#list-group-politica-cancelacion');
let navTab = $('#nav-tabContent');
let first = true;
let lPolCancelResponse = fetch("info/politicaCancelacion-mas-linias.php");
let pCancel = lPolCancelResponse.then(response => response.json());
pCancel
    .then(pCancel => {
        pCancel.forEach(item => {
            let nombre = item.nombre;
            lPolCancel.append(toAnchorList(nombre, first));
            let linias = item.linias.split(",");
            navTab.append(toTabPanel(nombre, linias, first));
            first = false;
        });
    })
    .then(() =>
        $("#list-group-politica-cancelacion a").on("click",function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    );

function toAnchorList(item, active) {
    return `<a class="list-group-item list-group-item-action ${active ? "active" : ""}" id="list-${item}-list" href="#list-${item}" role="tab" aria-controls="${item}">${item.toUpperCase()}</a>`
}

function toTabPanel(id, items, active) {
    let parent = document.createElement("div");
    let lGroup = document.createElement("ul");
    lGroup.classList.add("list-group");
    items.forEach(item => lGroup.innerHTML += toListItem(item));
    parent.appendChild(lGroup);
    return `<div class="tab-pane fade ${active ? "show active" : ""}" id="list-${id}" role="tabpanel" aria-labelledby="list-${id}-list">${$(parent).html()}</div>`
}