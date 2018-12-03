<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Profile</title>
    <?php include_once("libraries.php") ?>

</head>

<body>
<?php include_once("header.php") ?>

<section id="profilePage" class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Profile</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column nav-pills nav-fill admin-menu">
                    <li class="nav-item active"><a class="nav-link" href="#" data-target-id="modifyProfileTab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-target-id="imageTab">Avatar</a></li>
                </ul>
            </div>
            <div class="col-md-9 well admin-content" id="modifyProfileTab">
                <form id="profileForm">
                    <div class="row">
                        <div class="col-12 order-1 order-md-0">
                            <div class="row">
                                <label class="sr-only" for="fullNameForm">Name</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <h6 class="text-right my-auto mr-sm-3 col-md-3">Name</h6>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                                    </div>
                                    <input type="text" class="form-control col-md-6" id="fullNameForm" name="fullNameForm" style="width: 80px;" value="Philipp Vujic">
                                </div>
                            </div>
                            <div class="row">
                                <label class="sr-only" for="locationForm">Location</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <h6 class="text-right my-auto mr-sm-3 col-md-3">Location</h6>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><span class="fas fa-map-marker-alt text-danger"></span></div>
                                    </div>
                                    <input type="text" class="form-control col-md-6" id="locationForm" name="locationForm" value="Mallorca, ES">
                                </div>
                            </div>
                            <div class="row">
                                <label class="sr-only" for="emailForm">E-Mail</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <h6 class="text-right my-auto mr-sm-3 col-md-3">E-Mail</h6>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><span class="fas fa-envelope text-danger"></span></div>
                                    </div>
                                    <input type="text" class="form-control col-md-6" id="emailForm" name="emailForm" value="newtimestube@gmail.com">
                                </div>
                            </div>
                            <div class="row">
                                <label class="sr-only" for="telephoneForm">Telephone</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <h6 class="text-right my-auto mr-sm-3 col-md-3">Telephone</h6>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><span class="fas fa-phone text-danger"></span></div>
                                    </div>
                                    <input type="text" class="form-control col-md-6" id="telephoneForm" name="telephoneForm" value="666554422">
                                </div>
                            </div>
                            <div class="row">
                                <label class="sr-only" for="passwordForm">Password</label>
                                <div class="input-group mb-1 mr-sm-2">
                                    <h6 class="text-right my-auto mr-sm-3 col-md-3">Password</h6>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><span class="fas fa-lock text-danger"></span></div>
                                    </div>
                                    <input type="text" class="form-control col-md-5" id="passwordForm" name="passwordForm" placeholder="********" disabled>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#collapseProfile" class="ml-auto mr-2" data-toggle="collapse" role="button"
                                               aria-expanded="false" aria-controls="collapseProfile">
                                                <p id="changePasswordText">Modify</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="collapse col-12" id="collapseProfile">
                                    <div class="row">
                                        <label class="sr-only" for="newPasswordForm">New Password</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <h6 class="text-right my-auto mr-sm-3 col-md-3">New Password</h6>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-lock text-danger"></span></div>
                                            </div>
                                            <input type="text" class="form-control col-md-6" id="newPasswordForm" name="newPasswordForm" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="sr-only" for="confirmPasswordForm">Confirm Password</label>
                                        <div class="input-group mb-1 mr-sm-2">
                                            <h6 class="text-right my-auto mr-sm-3 col-md-3">Confirm Password</h6>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-lock text-danger"></span></div>
                                            </div>
                                            <input type="text" class="form-control col-md-6" id="confirmPasswordForm" name="confirmPasswordForm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9 well admin-content" id="imageTab">
                <div class="order-0 order-md-1">
                    <div class="row">
                        <input type='file' onchange="readURL(this);" name="imgForm" />
                        <img class="rounded-circle" id="imageForm" src="https://placeimg.com/250/250/people"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php include_once("footer.php") ?>
<script>
    $(document).ready(function()
    {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');

        allWellsExceptFirst.hide();
        navItems.click(function(e)
        {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');

            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
    });
</script>
<script src="js/custom/modifyProfile.js"></script>
</body>
</html>