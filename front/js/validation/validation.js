$(function(){
    $("#emailLogin").on('blur',bootstrapValidate('#emailLogin', 'email:Enter a valid email address!'))
                    .on('blur',bootstrapValidate('#emailLogin', 'required:Please fill out this field!'));
    $("#passwordLogin").on('blur',bootstrapValidate('#passwordLogin', 'required:Please fill out this field!'));

});