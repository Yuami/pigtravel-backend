$(document).ready(function () {
    $("#mobilebutton").click(function () {

        if ($('.openBtn').attr('data-leido') == 0) {
        }
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