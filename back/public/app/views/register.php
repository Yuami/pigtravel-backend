<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once("libraries.php") ?>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <title>Register</title>
</head>
<body id="landingBody">
<?php include_once("header.php") ?>
<div class="container col-sm-8 col-lg-4">
    <div class="row" id="registerForm">
        <form action="" method="get" class="col">
            <h2>Registro</h2>
            <p class="hint-text">Create una cuenta,para una mejor expriencia</p>
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
                <input class="form-control" placeholder="Fecha de Nacimiento" id="datepicker"/>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Contraseña"
                       required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirmar Contraseña"
                       required="required">
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> Acepto <a href="#">Los
                        Terminos de Uso
                    </a> &amp; <a href="#">Politicas Pivacidad</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Registrate Ahora</button>
            </div>

            <div class="text-center">Ya tienes una cuenta? <a href="login">Log in</a></div>
        </form>
    </div>
</div>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

<?php include_once("footer.php") ?>
</body>
</html>