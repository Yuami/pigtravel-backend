<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jasny-bootstrap.min.css">
    <title>Profile</title>

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
    <form id="profileForm">
        <div class="row">
            <div class="col-12 col-md-6 order-1 order-md-0">
                <div class="row">
                    <label class="sr-only" for="fullNameForm">Name</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="input-h6 my-auto mr-sm-3 col-md-6">Name</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-6" id="fullNameForm" style="width: 80px;">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="locationForm">Location</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="input-h6 my-auto mr-sm-3 col-md-6">Location</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-map-marker-alt text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-6" id="locationForm">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="emailForm">E-Mail</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="input-h6 my-auto mr-sm-3 col-md-6">E-Mail</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-envelope text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-6" id="emailForm">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="telephoneForm">Telephone</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <h6 class="input-h6 my-auto mr-3 col-md-6">Telephone</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-phone text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-6" id="telephoneForm">
                    </div>
                </div>
                <div class="row">
                    <label class="sr-only" for="passwordForm">Password</label>
                    <div class="input-group mb-1 mr-sm-2">
                        <h6 class="input-h6 my-auto mr-sm-3 col-md-6">Password</h6>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-lock text-danger"></span></div>
                        </div>
                        <input type="text" class="form-control col-md-6" id="passwordForm" placeholder="********">
                    </div>
                </div>
                <div class="row">
                    <a href="#collapseProfile" class="ml-auto mr-2" data-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="collapseProfile">
                        <p id="changePasswordText">Change Password</p></a>
                </div>
                <div class="collapse" id="collapseProfile">
                    <div class="row">
                        <label class="sr-only" for="newPasswordForm">New Password</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <h6 class="input-h6 my-auto mr-sm-3 col-md-6">New Password</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-lock text-danger"></span></div>
                            </div>
                            <input type="text" class="form-control col-md-6" id="newPasswordForm"
                                   placeholder="********">
                        </div>
                    </div>
                    <div class="row">
                        <label class="sr-only" for="confirmPasswordForm">Confirm Password</label>
                        <div class="input-group mb-1 mr-sm-2">
                            <h6 class="input-h6 my-auto mr-sm-3 col-md-6">Confirm Password</h6>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-lock text-danger"></span></div>
                            </div>
                            <input type="text" class="form-control col-md-6" id="confirmPasswordForm"
                                   placeholder="********">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-0 order-md-1">
                <div class="row">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" class="form-control" id="avatarForm" name="..."></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>


<?php include_once("footer.php") ?>
<script src="js/jasny-bootstrap.min.js"></script>

</body>
</html>