$(document).ready(function() {
    $( "#mobilebutton" ).click(function() {
         if(this.value==0) {
             $('[id=0]').hide();
             this.value=1;
         }else{
             $('[id=0]').show();
             this.value=0;
         }
        $(this)
            .find('[id="icon"]')
            .toggleClass('fa-eye-slash')
            .toggleClass('fa-eye');
    });

});