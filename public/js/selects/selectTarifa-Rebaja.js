// ------------------- Tarifa -----------------------

class Tarifa {
    constructor(id, fInicio, fFin, precio, general, pCancel) {
        this.id = id;
        this.fInicio = fInicio;
        this.fFin = fFin;
        this.precio = precio;
        this.general = general === "1";
        this.pCancel = pCancel;
    }

    isMe(id){
        return id == this.id;
    }

    toListGroupItem(){
        return `<li class="list-group-item">Tarifa ${this.id}</li>`
    }

    toOption() {
        return `<option value="${this.id}">Tarifa ${this.id}</option>`;
    }

    toRow() {
        let tr = $("<tr>");
        tr.append(td(this.id));
        tr.append(td(this.fInicio));
        tr.append(td(this.fFin));
        tr.append(td(this.precio));
        tr.append(this.general ? td("True") : td("False"));
        tr.append(td(this.pCancel));
        return tr;
    }

    static toTBody(tarifas) {
        let tbody = $("<tbody>");
        tbody.addClass("table-body");
        tarifas.forEach(item => {
            tbody.append(item.toRow());
        });
        return tbody;
    }

    static toListGroup(tarifas){
        return tarifas.map(tarifa => tarifa.toListGroupItem())
    }

    static async getAllImport() {
        let imported = null;
        await Tarifa.getAll().then(res => imported = Tarifa.import(res));
        return imported;
    }

    static import(JSON) {
        return JSON.map(item => {
            return new Tarifa(item.id, item.fechaInicio, item.fechaFin, item.precio, item.general, item.idPolitcaCancelacion);
        });
    }

    static async getAll() {
        const response = await fetch("info/selectTarifas.php");
        return await response.json();
    }

    static async getServer(id) {
        const response = await fetch(`info/selectTarifas.php?idTarifa=${id}`);
        return await response.json();
    }

    static getLocal(id, tarifas){
        if (id == "" || id == null || id == undefined)
            return tarifas;
        return tarifas.filter(tarifa => tarifa.isMe(id));
    }
}
// ------------------- Rebaja -----------------------
class Rebaja {
    constructor(id, dias, porcentaje, fInicio, fFin, fCreacion, activa, idTarifa) {
        this.id = id;
        this.dias = dias;
        this.porcentaje = porcentaje;
        this.fInicio = fInicio;
        this.fFin = fFin;
        this.fCreacion = fCreacion;
        this.activa = activa;
        this.idTarifa = idTarifa;
    }

    toOption() {
        return `<option value="${this.id}">Rebaja ${this.id}</option>`
    }

    static import(JSON) {
        return JSON.map(item => {
            return new Rebaja(item.id, item.dias, item.porcentaje, item.fInicio, item.fFin, item.fCreacion, item.activa, item.idTarifa);
        });
    }

    static async getAll() {
        let response = await fetch("info/selectRebajas.php");
        return await response.json();
    }

    static async getByTarifaServer(id) {
        const response = await fetch(`info/selectRebajas.php?idTarifa=${id}`);
        return await response.json();
    }

    static getByTarifaLocal(idTarifa, rebajas) {
        if (idTarifa == "" || idTarifa == null || idTarifa == undefined)
            return rebajas;

        return rebajas.filter(rebaja => rebaja.idTarifa == idTarifa);
    }

    static async getAllImport() {
        let imported = null;
        await Rebaja.getAll().then(res => imported = Rebaja.import(res));
        return imported;
    }
}

// ------------------- Helpers -----------------------
function renderTarifas(tarifas) {
    tarifas.forEach(tarifa => selectTarifa.append(tarifa.toOption()));
}

function renderTarifaTable(tarifas, table) {
    table.find('tbody').remove();
    table.append(Tarifa.toTBody(tarifas));
}

function td(item) {
    return `<td>${item}</td>`;
}

function renderRebajas(rebajas) {
    selectRebaja.empty();
    selectRebaja.append(`<option value="" selected>Rebaja...</option>`);
    rebajas.forEach(rebaja => selectRebaja.append(rebaja.toOption()));
}

// ------------------- Start -----------------------
let selectTarifa = $("#selectTarifa");
let selectRebaja = $("#selectRebaja");
let listGroup = $('#list-group-tarifa');
let table = $("#listadoTarifas");

let tarifas = Tarifa.getAllImport();
tarifas.then(renderTarifas);
tarifas.then(tarifas => renderTarifaTable(tarifas, table));
tarifas.then(tarifas => listGroup.append(Tarifa.toListGroup(tarifas)));

let rebajas = Rebaja.getAllImport();
rebajas.then(renderRebajas);

selectTarifa.change(() => {
    let tarifa = $("#selectTarifa option:selected");
    let idTarifa = tarifa.attr("value");
    tarifas.then(tarifas => renderTarifaTable(Tarifa.getLocal(idTarifa, tarifas), table));
    rebajas.then(rebajas => renderRebajas(Rebaja.getByTarifaLocal(idTarifa, rebajas)));
});