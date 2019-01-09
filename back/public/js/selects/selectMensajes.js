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
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("cardsmensajes");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}