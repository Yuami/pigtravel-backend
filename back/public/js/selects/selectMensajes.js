$(document).ready(function() {
    $( "#mobilebutton" ).click(function() {
        $(this)
            .find('[id="icon"]')
            .toggleClass('fa-eye-slash')
            .toggleClass('fa-eye');

        $("#cardsmensajes").load("#cardsmensajes < *");
        });
    $( "#listaViviendas" ).onchange(function() {

    });
});