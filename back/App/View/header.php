<?php

use Config\File;
use Config\Session;

if (!Session::isSet('userID')) { ?>
    <header class="head">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark">
                <a href="/">
                    <img src="/img/logotemporal2.png" alt="" class="header-logo ml-md-1">
                </a>
                <div class="head-brand">
                    <h6 class="active" href="#">ADMINISTRATION PANEL</h6>
                </div>
            </nav>
        </div>
    </header>
<?php } else {
    $user = unserialize(Session::get('user'));
    $profileImage = File::getProfileImage($user);
    ?>
    <header class="head">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="head-brand">
                    <h2 class="algn-r head-brand-text active" href="#">ADMIN</h2>
                    <p class="algn-r mb-0"><span class="premium-text">Premium</span></p>
                </div>
                <a href="/">
                    <img src="/img/logotemporal2.png" alt="" class="header-logo ml-md-1">
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
                                <span class="textNav">HOUSES</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/reservations" class="nav-link">
                            <span class="icoNav">
                                <i class="fas fa-list-alt fa-fw"></i>
                            </span>
                                <span class="textNav">RESERVATIONS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/support" class="nav-link">
                                <span class="icoNav">
                            <i class="fas fa-question-circle fa-fw"></i>
                                </span>
                                <span class="textNav">SUPPORT</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="nav-ul" class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/messages" class="nav-link"><i class="far fa-comments fa-fw"></i>
                                <span class="textRightNav d-md-none">MESSAGES</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/notifications" class="nav-link"><i class="far fa-bell fa-fw"></i>
                                <span class="textRightNav d-md-none">NOTIFICATIONS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/settings" class="nav-link d-xs-block d-md-none">
                            <span class="icoNav">
                                <i class="fas fa-cog fa-fw"></i>
                            </span>
                                <span class="textNav">SETTINGS</span>
                            </a>
                        </li>

                        <li class="nav-item d-xs-block d-md-none">
                            <a href="/premium" class="nav-link">
                            <span class="icoNav">
                                <i class="premium-text fas fa-award fa-fw"></i>
                            </span>
                                <span class="textNav premium-text">MANAGE PREMIUM</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/logout" class="nav-link d-xs-block d-md-none">
                            <span class="icoNav">
                                <i class="fas fa-door-open fa-fw  text-danger"></i>
                            </span>
                                <span class="textNav text-danger">LOGOUT</span>
                            </a>
                        </li>
                    </ul>



                    <div class="dropdown d-none d-md-block">
                        <button id="dropdownHeaderButton" type="button"
                                class="nav-link nav-item header-profile-sm btn dropdown-toggle-split dropdown-toggle ml-md-3 d-none d-md-block"
                                data-toggle="dropdown">
                            <img src="/<?php echo $profileImage ?>" alt="" class="header-profile-img rounded-circle mr-md-1">
                        </button>
                        <div id="dropdownHeaderMenu" aria-labelledby="dropdownMenuButton" class="dropdown-menu text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="/<?php echo $profileImage ?>" alt=""
                                             class="header-profile-img rounded-circle"><span
                                                class="textRightNav d-md-none"> PROFILE</span>
                                    </div>
                                    <div class="col-8">
                                        <p class="text-left ml-md-1"><strong><?php echo $user->getNombre(); ?></strong><br><span class="text-left small">Mallorca, ES</span></p>

                                    </div>
                                </div>
                                <div class="row">
                                    <a href="/settings"
                                       class="btn btn-primary btn-block btn-sm">Settings</a>
                                    <a href="/premium"
                                       class="btn btn-warning text-white btn-sm btn-block">Manage
                                        Premium</a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <a href="/logout" class="btn btn-sm btn-danger btn-block">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
<?php } ?>