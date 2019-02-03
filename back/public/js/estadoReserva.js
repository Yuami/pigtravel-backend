let estados = {
    "cancelada": "badge-danger",
    "reservada": "badge-warning",
    "pendiente": "badge-secondary",
    "pagada": "badge-success",
};

$(function () {
    let badge = $('#estado-reserva');
    updateEstado(badge);
});

function oferta() {
    
}

function ofertaModal() {
    $('#ofertaModal').modal('show');
}

function cancelarAlerta() {
    $('#alertModal').modal('show');
}

function updateEstado(badge) {
    let value = badge.text();
    let type = estados[value.toLowerCase()];
    badge.addClass(type);
}

function aceptar() {
    sendRequest('reservada')
}

function cancelar() {
    sendRequest('cancelar')
}

function sendRequest(type) {
    let select = {
        reservada: 2,
        cancelar: 1
    };
    let estado = select[type];

    let params = {
        "_method": "PUT",
        "estado": estado
    };

    post(params);
}

function post(params, path) {
    path = path || '';
    let method = "post";
    let form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for (let key in params) {
        if (params.hasOwnProperty(key)) {
            let hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}