$(function(){
    $("#changePasswordText").click(function () {
        if (!$("#collapseProfile").hasClass("collapsing")) {
            if ($("#collapseProfile").hasClass("show")) {
                $('#passwordForm').attr('disabled', '');
            } else {
                $('#passwordForm').removeAttr('disabled');
            }
        }
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageForm').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
};


