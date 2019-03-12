<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use Config\Cookie;
    use Config\Session;

    include_once(ROOT . "libraries.php") ?>
    <title>Log in</title>
</head>

<body id="landingBody">

<?php include_once("header.php") ?>

<section>
    <div class="container-fluid">
        <div class="row m-2 m-md-5">
            <div class="col-12 col-xs-8 offset-xs-2 my-auto text-center">
                <div id="loginForm">
                    <h5 class="mt-3">Pig Travel</h5>
                    <h5 class="mb-3">Panel de administracion</h5>
                    <h6 class="mb-3">Administra tus reservas!</h6>
                    <form action="/login" method="post" class="text-left mb-3">
                        <div class="form-group">
                            <label for="emailLogin">
                                <span class="fas fa-user text-danger mr-1 ml-2"></span>Correo
                            </label>
                            <input type="email" class="form-control" name="emailLogin" id="emailLogin"
                                   aria-describedby="emailHelp" placeholder="Tu correo electronico" value="
                                   <?php echo(Cookie::get('lastEmail')); ?>" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="passwordLogin">
                                <span class="fas fa-lock text-danger mr-1 ml-2"></span>Contraseña
                            </label>
                            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin"
                                   aria-describedby="emailHelp" placeholder="Tu contraseña" required>
                        </div>
                        <p class="text-right"><a href="#" id="forgotPasswordButton" data-toggle="modal"
                                                 data-target="#forgotPasswordModal">Contraseña Olvidada</a></p>
                        <button type="submit" class="btn btn-primary btn-block">INICIAR SESION</button>
                    </form>
                    <hr class="mb-4">
                    <p>No tienes cuenta?</p>
                    <a href="register" class="btn btn-primary btn-block mb-4">REGISTRAR</a>
                </div>
            </div>
        </div>
        <div id="loginError">
            <div id="loginErrorModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Acceso denegado!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="modal-text"><?php echo Session::get("loginStatus"); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Intentar de nuevo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="forgotPassword">
            <div id="forgotPasswordModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-group" id="forgotPasswordForm" action="#">
                            <div class="modal-header">
                                <h5 class="modal-title">Contraseña Olvidada</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-1">Email</p>
                                <input class="form-control mb-1" type="text">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Recover</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php") ?>

<?php
if (Session::get('loginStatus')) { ?>
    <script type="text/javascript">
        $('#loginErrorModal').modal('show');
    </script>
<?php }
Session::delete('loginStatus'); ?>
<script src="/js/validation/bootstrap-validator.js"></script>
<script src="/js/validation/validation.js"></script>
</body>
</html>