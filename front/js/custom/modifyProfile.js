$(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    $("#changePasswordText").click(function () {
        let collpaseProfile = $("#collapseProfile");
        let passwordForm =  $('#passwordForm');

        if (!collpaseProfile.hasClass("collapsing")) {
            if (collpaseProfile.hasClass("show")) {
                passwordForm.attr('disabled', '');
            } else {
                passwordForm.removeAttr('disabled');
            }
        }
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        };
        reader.readAsDataURL(input.files[0]);
    }
}