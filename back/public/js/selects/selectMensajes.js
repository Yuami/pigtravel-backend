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
            $('#nombreReciever').empty();
            $('#nombreReciever').html('Para: <b>'+nomPersona+'</b>');
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
