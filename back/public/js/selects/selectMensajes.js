$(document).ready(function() {
    $( "#mobilebutton" ).click(function() {

           if($('tr').data("leido").value==0) {
                $('tr').data("leido").hide();
            }


        $(this)
            .find('[id="icon"]')
            .toggleClass('fa-eye-slash')
            .toggleClass('fa-eye');
    });
    $('.openBtn').on('click',function(){
            nomPersona = $(this).attr('data-to');
            idVivienda = $(this).attr('data-id-viv');
            idReciever = $(this).attr('data-id');
            $('#nombreReciever').empty();
            $('#nombreReciever').append('Para: <b>'+nomPersona+'</b>');
            $('#nombreReciever').append('<input type="hidden" name="idVivienda" value="'+idVivienda+'">');
            $('#nombreReciever').append('<input type="hidden" name="idReciever" value="'+idReciever+'">');
            $('#myModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false,
        });
    });
});
function myNewFunction(sel) {
    var val=sel.options[sel.selectedIndex].value;
    if(val==0){
        $("tr").show();

    }else {
        $("tr").hide();
        $("tr[id=" + val + "]").show();
    }
}
