<?php

use Config\Session;
use Model\DAO\PersonaDAO;

if (!Session::me()) { ?>
    <header class="head">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark">
                <a href="/">
                    <picture>
                        <source srcset="/img/logotemporal.webp" type="image/webp">
                        <source srcset="/img/logotemporal.png" type="image/jpg">
                        <img src="/img/logotemporal.png" class="header-logo ml-md-1" alt="vacaciones pigtravel">
                    </picture>
                </a>
                <div class="head-brand">
                    <h6 class="active" href="#">PANEL DE ADMINISTRACION</h6>
                </div>
            </nav>
        </div>
    </header>
<?php } else {
    $user = PersonaDAO::me();
    if (!$user instanceof \Model\Items\Persona) die();
    ?>
    <header class="head">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="head-brand">
                    <h2 class="algn-r head-brand-text active" href="#">ADMIN</h2>
                </div>
                <a href="/">
                    <picture>
                        <source srcset="/img/logotemporal.webp" type="image/webp">
                        <source srcset="/img/logotemporal.png" type="image/jpg">
                        <img src="/img/logotemporal.png" class="header-logo ml-md-1"
                             alt="pigtravel alquiler vacacional">
                    </picture>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse justify-content-stretch" id="mainNavbar">
                    <ul id="nav-ul" class="navbar-nav">

                        <li class="nav-item">
                            <a href="/houses" class="nav-link">
                            <span class="icoNav">
                                <i class="fas fa-home fa-fw"></i>
                            </span>
                                <span class="textNav">CASAS</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/reservations" class="nav-link">
                            <span class="icoNav">
                                <i class="fas fa-list-alt fa-fw"></i>
                            </span>
                                <span class="textNav">RESERVAS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/support" class="nav-link">
                                <span class="icoNav">
                            <i class="fas fa-question-circle fa-fw"></i>
                                </span>
                                <span class="textNav">SOPORTE</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="nav-ul" class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/messages" class="nav-link"><i class="far fa-comments fa-fw"></i>
                                <span class="textRightNav d-md-none">MENSAJES</span>
                            </a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="/notifications" class="nav-link"><i class="far fa-bell fa-fw"></i>-->
<!--                                <span class="textRightNav d-md-none">NOTIFICACIONES</span>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li class="nav-item">
                            <a href="/settings" class="nav-link d-xs-block d-md-none">
                            <span class="icoNav">
                                <i class="fas fa-cog fa-fw"></i>
                            </span>
                                <span class="textNav">CONFIGURACIÓN</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/logout" class="nav-link d-xs-block d-md-none">
                            <span class="icoNav">
                                <i class="fas fa-door-open fa-fw  text-danger"></i>
                            </span>
                                <span class="textNav text-danger">CERRAR SESIÓN</span>
                            </a>
                        </li>
                    </ul>


                    <div class="dropdown d-none d-md-block">
                        <button id="dropdownHeaderButton" type="button"
                                class="nav-link nav-item header-profile-sm btn dropdown-toggle-split dropdown-toggle ml-md-3 d-none d-md-block"
                                data-toggle="dropdown">
                            <img src="<?= $user->image() ?>" alt="pigtravel alquiler vacacional"
                                 class="header-profile-img rounded-circle mr-md-1">
                        </button>
                        <div id="dropdownHeaderMenu" aria-labelledby="dropdownMenuButton"
                             class="dropdown-menu text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?= $user->image() ?>" alt="pigtravel user"
                                             class="header-profile-img rounded-circle">
                                        <span class="textRightNav d-md-none"> Perfil</span>
                                    </div>
                                    <div class="col-8">
                                        <p class="text-left ml-md-1">
                                            <strong><?= $user->getNombre(); ?></strong>
                                            <br>
                                            <span class="text-left small"><?= $user->getCiudad()?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="/settings"
                                       class="btn btn-primary btn-block btn-sm">Configuración</a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <a href="/logout" class="btn btn-sm btn-danger btn-block">Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
<?php } ?>
<?php
if (Session::isSet("wrong")) {
    ?>
    <div id="wrongReservation" class="alert alert-danger" role="alert">
        <strong>Error! </strong> <?= Session::get("wrong")?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    Session::delete("wrong");
}

if (Session::isSet("success")) {
    ?>
    <div id="success" class="alert alert-success" role="alert">
        <strong>Éxito! </strong> <?= Session::get("success")?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    Session::delete("success");
}
?>
