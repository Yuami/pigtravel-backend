<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Log in</title>
    <?php include_once("libraries.php") ?>
</head>

<body id="landingBody">

<?php include_once("header.php") ?>

<section class="w-100">
    <div class="container-fluid">
        <div class="row ch-100">
            <div class="col-12 col-xs-8 offset-xs-2 my-auto text-center">
                <div id="loginForm">
                    <h5 class="mt-3">Pig Travel</h5>
                    <h5 class="mb-3">Administration Panel</h5>
                    <h6 class="mb-3">Manage your Reservations</h6>
                    <form action="info/loginController.php" method="post" class="text-left mb-3">
                        <div class="form-group">
                            <label for="emailLogin">
                                <span class="fas fa-user text-danger mr-1 ml-2"></span>Email
                            </label>
                            <input type="email" class="form-control" name="emailLogin" id="emailLogin"
                                   aria-describedby="emailHelp" placeholder="Enter email" value="
                                   <?php if (isset($_COOKIE['lastEmail'])) {
                                echo $_COOKIE['lastEmail'];
                            }
                            ?>" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="passwordLogin">
                                <span class="fas fa-lock text-danger mr-1 ml-2"></span>Password
                            </label>
                            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin"
                                   aria-describedby="emailHelp" placeholder="Enter password" required>
                        </div>
                        <p class="text-right"><a href="#">Forgot Password</a></p>
                        <button type="submit" class="btn btn-primary btn-block">LOG IN</button>
                    </form>
                    <hr class="mb-4">
                    <p>No account yet?</p>
                    <a href="register.php" class="btn btn-primary btn-block mb-4">REGISTER</a>
                </div>
            </div>
        </div>
        <div id="loginError">
            <div id="loginErrorModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Access Denied</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="modal-text"><?php if (isset($_SESSION['loginStatus'])) {
                                    echo $_SESSION['loginStatus'];
                                } ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Try Again</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php") ?>

<?php if (Session::isSet('loginStatus')) { ?>
    <script type="text/javascript">
        $('#loginErrorModal').modal('show');
    </script>
<?php }
Session::delete('loginStatus'); ?>
<script src="js/validation/bootstrap-validator.js"></script>
<script src="js/validation/validation.js"></script>
</body>
</html>