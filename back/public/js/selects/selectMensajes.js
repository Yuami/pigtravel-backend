$(document).ready(function () {
    var counter=true;

    if(window.location.hash) {
        $("#myModal"+window.location.hash.charAt(1)).modal();
    }


       $('#mobilebutton').on('click',function(){
           if(counter) {
               $('#cardsmensajes tr').each(function () {
                   if ($(this).data('leido') == 0) {
                       $(this).hide();
                   }
               })
               counter=false;
           }
           else{
               $('#cardsmensajes tr').each(function () {
                       $(this).show();

               });
               counter=true;
           };
        $(this)
            .find('[id="icon"]').toggleClass('fa-eye-slash').toggleClass('fa-eye');
    });

    $('.openBtn').on('click', function () {
        $('#myModal'+this.id).modal();
    });
});


function myNewFunction(sel) {
    var val = sel.options[sel.selectedIndex].value;
    if (val == 0) {
        $("tr").show();

    } else {
        $("tr").hide();
        $("tr[data-id-viv=" + val + "]").show();
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

    function post(id)
    {
        var comment = document.getElementById("comment").value;
        if(comment)
    {
        $.ajax
        ({
        type: 'post',
        url: 'info/commentajax.php',
        data:
    {
        idReciever: id,
        user_comm:comment,
    },
        success: function (response)
    {
        document.getElementById("comment").value="";
    }
    });
    }

        return false;
    }
    function autoRefresh_div()
    {
        $("#result").load("info/selectChat.php").show();
    }

    setInterval('autoRefresh_div()', 2000);

