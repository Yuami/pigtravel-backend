<header class="head">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="head-brand">
                <h2 class="algn-r head-brand-text" href="#">ADMIN</h2>
                <p class="algn-r mb-0"><span class="premium-text">Premium</span></p>
            </div>
            <a href="index.php">
                <img src="img/logo.png" alt="" class="header-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse justify-content-stretch" id="mainNavbar">
                <ul id="nav-ul" class="navbar-nav">
                    <li class="nav-item">
                        <ul class="navbar-nav d-xs-block d-md-none">
                            <li class="nav-item ml-md-3 header-profile-sm">
                                <a href="profile.php" class="nav-link">
                                    <img src="img/tempprofile.jpg" alt=""
                                         class="header-profile-img rounded-circle"><span class="textRightNav d-md-none"> PROFILE</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item d-xs-block d-md-none">
                        <a href="premium.php" class="nav-link">
                            <span class="icoNav">
                                <i class="text-danger fas fa-award fa-fw"></i>
                            </span>
                            <span class="textNav text-danger">MANAGE PREMIUM</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="houselist.php" class="nav-link">
                            <span class="icoNav">
                                <i class="fas fa-home fa-fw"></i>
                            </span>
                            <span class="textNav">HOUSES</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="reservations.php" class="nav-link">
                            <span class="icoNav">
                                <i class="fas fa-list-alt fa-fw"></i>
                            </span>
                            <span class="textNav">RESERVATIONS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="support.php" class="nav-link">
                                <span class="icoNav">
                            <i class="fas fa-question-circle fa-fw"></i>
                                </span>
                            <span class="textNav">SUPPORT</span>
                        </a>
                    </li>
                </ul>
                <ul id="nav-ul" class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="messages.php" class="nav-link"><i class="far fa-comments fa-fw"></i>
                            <span class="textRightNav d-md-none">MESSAGES</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="notifications.php" class="nav-link"><i class="far fa-bell fa-fw"></i>
                            <span class="textRightNav d-md-none">NOTIFICATIONS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="settings.php" class="nav-link d-xs-block d-md-none">
                            <span class="icoNav">
                                <i class="fas fa-cog fa-fw"></i>
                            </span>
                            <span class="textNav">SETTINGS</span>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button id="dropdownHeaderButton" type="button"
                            class="nav-link nav-item ml-md-3 header-profile-sm d-sm-none d-md-block btn dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown">
                        <img src="img/tempprofile.jpg" alt="" class="header-profile-img rounded-circle">
                    </button>
                    <div class="dropdown-menu text-center">
                        <h6>Philipp Vujic</h6>
                        <p>Mallorca, ES</p>
                        <a class="dropdown-item text-danger" href="premium.php">MANAGE PREMIUM</a>
                        <a class="dropdown-item" href="settings.php">SETTINGS</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>