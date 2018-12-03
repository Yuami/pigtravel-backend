<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once("libraries.php") ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <title>Register</title>
</head>
<body id="landingBody">
<?php include_once("header.php") ?>
<div class="container col-sm-8 col-md-8 col-lg-4">
    <div class="row" id="registerForm">
        <form action="" method="get" class="col">
            <h2>Register</h2>
            <p class="hint-text">Create your account, for a better experience</p>
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="Nombre" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Apellidos" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="DNI" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Telefono" required="required">
            </div>
            <div class="form-group">
                <div class='input-group date' id='calendar'>
                    <input type='text' class="form-control" placeholder="Fecha Nacimiento">
                    <span class="input-group-addon">
                    <span class="fa-calendar"></span>
                </span>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirmar Contraseña"
                       required="required">
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms
                        of
                        Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register Now</button>
            </div>

            <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
        </form>
    </div>
</div>
<?php include_once("footer.php") ?>
</body>
</html>