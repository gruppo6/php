<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile">
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <a href="index.php" class="c-logo">
                        <img src="assets/base/img/logo.png" alt="Infobasic" class="c-desktop-logo">
                        <img src="assets/base/img/logo.png" alt="Infobasic" class="c-desktop-logo-inverse">
                        <img src="assets/base/img/logo.png" alt="Infobasic" class="c-mobile-logo">
                    </a>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                    <button class="c-search-toggler" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: HOR NAV -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <!-- BEGIN: MEGA MENU -->
                    <ul class="nav navbar-nav c-theme-nav">
                        <li class="c-active c-menu-type-classic">
                            <a href="index.php" class="c-link dropdown-toggle">Home</a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="#" class="c-link dropdown-toggle">Esami</a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="#" class="c-link dropdown-toggle">Certificazioni</a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="#" class="c-link dropdown-toggle">Contatti</a>
                        </li>
                        <?php if (!isset($login_session)) { ?>
                            <li class="c-menu-type-classic">
                                <a href="pagina-registrazione-utente.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-black c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Registrati</a>
                            </li>
                            <li class="c-menu-type-classic">
                                <a href="pagina-login.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-black c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-login"></i> Accedi</a>
                            </li>
                        <?php } ?>
                        <?php if (isset($login_session)) { ?>
                            <li class="c-menu-type-classic">
                                <a href="backend.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-black c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-star"></i> Cruscotto</a>
                            </li>
                        <?php } ?> 
                    </ul>
                    <!-- END MEGA MENU -->
                </nav>
                <!-- END: MEGA MENU -->
                <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- END: HOR NAV -->
            </div>
        </div>
    </div>
</header>
<!-- END: HEADER -->