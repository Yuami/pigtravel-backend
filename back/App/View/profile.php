<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\File;

    require_once ROOT . "libraries.php" ?>
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

    <div class="container">
        <form id="profileForm" method="POST">
            <div class="row">
                <div class="order-0 order-md-1 offset-md-1 col-md-3 side-menu">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="<?php echo File::getProfileImage($user); ?>" class="picture-src"
                                 id="wizardPicturePreview"
                                 title="">
                            <input name="imgForm" type="file" id="wizard-picture" class="">
                        </div>
                        <h6 class="">Choose Picture</h6>
                    </div>
                    <input class="btn d-md-block d-none btn-block btn-primary mt-3" type="submit" form="profileForm"/>
                </div>
                <div class="order-1 order-md-0 col-md-8">
                    <div class="col-12 order-1 order-md-0 ">
                        <div class="row">
                            <label class="sr-only" for="firstNameForm">Name</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Name</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span class="fas fa-user text-danger"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="firstNameForm" name="firstNameForm"
                                       style="width: 80px;" value="<?php echo $user->getNombre(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="surnameForm">Surname</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Surname</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span class="fas fa-user text-danger"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="surnameForm" name="surnameForm"
                                       style="width: 80px;" value="<?php echo $user->getApellido1(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="locationForm">Location</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Location</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span
                                                class="fas fa-map-marker-alt text-danger"></span></div>
                                </div>
                                <input type="text" class="form-control" id="locationForm" name="locationForm"
                                       value="Mallorca, ES">
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="emailForm">E-Mail</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">E-Mail</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span
                                                class="fas fa-envelope text-danger"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="emailForm" name="emailForm"
                                       value="<?php echo $user->getCorreo(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="telephoneForm">Telephone</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Telephone</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span class="fas fa-phone text-danger"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="telephoneForm" name="telephoneForm"
                                       value="<?php echo $user->getTlf(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="passwordForm">Password</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Password</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span class="fas fa-lock text-danger"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="passwordForm" name="passwordForm"
                                       placeholder="********" disabled>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a href="#collapseProfile" class="ml-auto mr-2" data-toggle="collapse"
                                           role="button"
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
                                        <h6 class="text-md-right my-auto mr-sm-3 col-md-3">New Password</h6>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><span
                                                        class="fas fa-lock text-danger"></span></div>
                                        </div>
                                        <input type="text" class="form-control" id="newPasswordForm"
                                               name="newPasswordForm">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="sr-only" for="confirmPasswordForm">Confirm Password</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Confirm Password</h6>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><span
                                                        class="fas fa-lock text-danger"></span></div>
                                        </div>
                                        <input type="text" class="form-control" id="confirmPasswordForm"
                                               name="confirmPasswordForm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="sr-only" for="descriptionForm">Description</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <h6 class="text-md-right my-auto mr-sm-3 col-md-3">Description</h6>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span class="fas fa-pen text-danger"></span>
                                    </div>
                                </div>
                                <textarea type="text" rows="7" class="form-control" id="descriptionForm"
                                          name="descriptionForm"
                                          placeholder="Tell us something about you!"><?= $user->getDescripcion(); ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <input class="btn d-md-none d-block btn-block btn-primary mt-3" type="submit"
                                   form="profileForm"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once("footer.php") ?>
<script src="/js/jasny-bootstrap.min.js"></script>
<script src="/js/custom/modifyProfile.js"></script>
</body>
</html>