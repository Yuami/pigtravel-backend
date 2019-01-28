let estados = [
    {
        estado: "cancelada",
        class: "badge-danger"
    },
    {
        estado: "reservada",
        class: "badge-warning"
    },
    {
        estado: "pendiente",
        class: "badge-secondary"
    },
    {
        estado: "pagada",
        class: "badge-success"
    }];
$(function() {
    let badge = this;
    updateEstado(badge);
});


function updateEstado(badge) {
    let value = badge.text();
    estados.forEach(e => {
        if (e.estado === value.toLowerCase()) {
            badge.addClass(e.class);
        }
    })
}
