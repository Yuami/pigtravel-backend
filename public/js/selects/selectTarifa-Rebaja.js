function renderTarifas(tarifas) {
    tarifas.forEach(tarifa => selectTarifa.append(tarifa.toOption()));
}

function td(item) {
    return `<td>${item}</td>`;
}

class Tarifa {
    constructor(id, fInicio, fFin, precio, general, pCancel) {
        this.id = id;
        this.fInicio = fInicio;
        this.fFin = fFin;
        this.precio = precio;
        this.general = general === "1";
        this.pCancel = pCancel;
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
        tarifas.forEach(item => {
            tbody.append(item.toRow());
        });
        return tbody;
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

    static async get(id) {
        const response = await fetch(`info/selectTarifas.php?idTarifa=${id}`);
        return await response.json();
    }

    static getByRebaja(rebaja) {
        return rebaja.getTarifa();
    }
}

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

    getTarifa(){

    }
}

let selectTarifa = $("#selectTarifa");
let selectRebaja = $("#selectRebaja");

let tarifas = Tarifa.getAllImport().then(tarifas => {
    renderTarifas(tarifas);
    return tarifas;
});