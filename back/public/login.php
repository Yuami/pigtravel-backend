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
    <title>Log in</title>
</head>

<body>
<div id="landingPage">
    <?php include_once("header.php") ?>
    <div class="container">

        <section id="landingPageSection">
            <div class="row" id="loginForm">
                <div class="col-12 col-xs-8 offset-xs-2 text-center">
                    <h5 class="mt-3">Pig Travel</h5>
                    <h5 class="mb-3">Administration Panel</h5>
                    <h6 class="mb-3">Manage your Reservations</h6>
                    <form action="info/loginController.php" method="post" class="text-left mb-3">
                        <div class="form-group">
                            <label for="emailLogin">
                                <span class="fas fa-user text-danger mr-1 ml-2"></span>Email
                            </label>
                            <input type="email" class="form-control" name="emailLogin" id="emailLogin"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group mt-4">
                            <label for="passwordLogin">
                                <span class="fas fa-lock text-danger mr-1 ml-2"></span>Password
                            </label>
                            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin"
                                   aria-describedby="emailHelp" placeholder="Enter password">
                        </div>
                        <p class="text-right"><a href="#">Forgot Password</a></p>
                        <button type="submit" class="btn btn-primary btn-block">LOG IN</button>
                    </form>
                    <hr class="mb-4">
                    <p>No account yet?</p>
                    <a href="#" class="btn btn-primary btn-block mb-4">REGISTER</a>
                </div>
            </div>
        </section>

    </div>

    <?php include_once("footer.php") ?>
</div>
<script src="js/validation/bootstrap-validator.js"></script>
<script src="js/validation/validation.js"></script>
</body>
</html>