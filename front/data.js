let container = $('#table-container');
let select = $('#select');
let taula = $('#taula');

let normal = $('#normal');
let idOut = $('#idOut');
let idioma = $('#idioma');
let selectbtn = $('#selectbtn');
let edit = $('#edit');

let lastOpt = 0;
let order = ["desc", "asc"];
c(taula);

select.change(() => {
    let option = select.children('option:selected').val();
    taula.order([ [lastOpt, order[o]] ]).draw();
    lastOpt = option.val();
});

normal.click(() => {
    taula = reset(container);
    c(taula);
});

idOut.click(() => {
    taula = reset(container);
    taula.children("tBody").empty();
    c(taula).column(0).visible(false);
});

idioma.click(() => {
    taula = reset(container);
    c(taula, "Catalan");
});

selectbtn.click(() =>{
    taula = reset(container);
    let tab = e();
    tab.select = true;
    n(taula,tab);
});

let taula6 = $('#taula6');
taula6 = c(taula6);

function e(lang = "English") {
    return {
        ajax: {
            url: "http://localhost:63342/lloguer_vacacional/controller/LoginController.phproller.php",
            dataSrc: '',
            type: 'GET'
        },
        columns: [
            {data: 'id'},
            {data: 'nombre'}
        ],
        language: {
            url: `http://cdn.datatables.net/plug-ins/1.10.19/i18n/${lang}.json`
        }
    }
}

function n(table, tab) {
    table.DataTable(tab);
}

function c(table, lang = "English") {
    return table.DataTable(e(lang));
}

function reset(container) {
    container.empty();
    render(container);
    return container.children("#taula");
}

function render(container) {
    container.append(`<table id="taula" class="table table-striped table-bordered my-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                </tr>
                </thead>
            </table>`);
}