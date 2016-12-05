<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, md5($_POST['password']));
    $check = "";
    $sql = "SELECT id FROM utenti WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $check = 'Bentornato!';
        header("location: controllo.php");
    } else {
        $check = '<p>Errore Password o Login errata</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="it_IT" dir="ltr">

    <head>
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN: BASE PLUGINS  -->
        <link href="assets/plugins/revo-slider/css/settings.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
        <!-- END: BASE PLUGINS -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/base/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="assets/base/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css"/>
        <link href="assets/base/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="img/favicon.png"/>
        <title>infobasic - brief</title>
    </head>
    <body class="c-layout-header-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <!-- BEGIN: HEADER -->
        <header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile">
            <div class="c-navbar">
                <div class="container">
                    <!-- BEGIN: BRAND -->
                    <div class="c-navbar-wrapper clearfix">
                        <div class="c-brand c-pull-left">
                            <a href="index.php" class="c-logo">
                                <img src="img/logo.png" alt="Infobasic" class="c-desktop-logo">
                                <img src="img/logo.png" alt="Infobasic" class="c-desktop-logo-inverse">
                                <img src="img/logo.png" alt="Infobasic" class="c-mobile-logo">
                            </a>
                            <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                                <span class="c-line"></span>
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
                                <li class="c-menu-type-classic">
                                    <a href="registrazioneUtente.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-black c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Registrati</a>
                                </li>
                                <li class="c-menu-type-classic">
                                    <a href="login.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-black c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-login"></i> Accedi</a>
                                </li>
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
        <!-- END: LAYOUT/HEADERS/HEADER-1 -->        
        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <div class="c-content-box c-size-md c-bg-grey">
                <div class="container">
                    <form action = "" method = "post" class="form-signin">
                        <div class="c-shop-login-register-1">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Accedi</h3>
                                <div class="c-line-left">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default c-panel">
                                        <div class="panel-body c-panel-body">
                                            <div class="form-item form-type-textfield form-item-name">
                                                <div class = "form-group has-feedback">
                                                    <input placeholder="Username" type="text" class="form-control c-square c-theme input-lg required" id="edit-name" name="username" value="" size="60" maxlength="60" />
                                                    <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-password form-item-pass">
                                                <div class = "form-group has-feedback">
                                                    <input placeholder="Password" type="password" id="edit-pass" name="password" value="" size="60" maxlength="128" class="form-control c-square c-theme input-lg required" />
                                                    <span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span>
                                                </div>
                                            </div>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input class="btn-medium btn btn-mod form-submit btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white" type="submit" id="edit-submit" name="op" value="Log in" />
                                            </div>    
                                            <?php
                                            if (isset($check)) {
                                                echo $check;
                                            }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default c-panel">
                                        <div class="panel-body c-panel-body">
                                            <div class="c-content-title-1">
                                                <h3 class="c-left">
                                                    <i class="icon-user"></i>Non hai un account?</h3>
                                                <div class="c-line-left c-theme-bg"></div>
                                                <p>Iscriviti a infobasic.</p>
                                            </div>
                                            <div class = "c-form-register"><a href="registrazioneUtente.php">Clicca qui.</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: PAGE CONTAINER -->
        <!-- BEGIN: LAYOUT/FOOTERS/FOOTER-5 -->
        <a name="footer"></a>
        <footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
            <div class="c-prefooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="c-container c-first">
                                <div class="c-content-title-1">
                                    <h3 class="c-font-uppercase c-font-bold c-font-white">JAN<span class="c-theme-font">GO</span></h3>
                                    <div class="c-line-left hide">
                                    </div>
                                    <p class="c-text">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, s ed elit diam nonummy ad minim veniam quis nostrud exerci et tation diam.
                                    </p>
                                </div>
                                <ul class="c-links">
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="c-container">
                                <div class="c-content-title-1">
                                    <h3 class="c-font-uppercase c-font-bold c-font-white">Latest Posts</h3>
                                    <div class="c-line-left hide">
                                    </div>
                                </div>
                                <div class="c-blog">
                                    <div class="c-post">
                                        <div class="c-post-img">
                                            <img src="assets/base/img/content/stock/9.jpg" alt="" class="img-responsive"/>
                                        </div>
                                        <div class="c-post-content">
                                            <h4 class="c-post-title"><a href="#">Ready to Launch</a></h4>
                                            <p class="c-text">
                                                Lorem ipsum dolor sit amet ipsum sit, consectetuer adipiscing elit sit amet
                                            </p>
                                        </div>
                                    </div>
                                    <div class="c-post c-last">
                                        <div class="c-post-img">
                                            <img src="assets/base/img/content/stock/14.jpg" alt="" class="img-responsive"/>
                                        </div>
                                        <div class="c-post-content">
                                            <h4 class="c-post-title"><a href="#">Dedicated Support</a></h4>
                                            <p class="c-text">
                                                Lorem ipsum dolor ipsum sit ipsum amet, consectetuer sit adipiscing elit ipsum elit elit ipsum elit
                                            </p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-md c-btn-border-1x c-theme-btn c-btn-uppercase c-btn-square c-btn-bold c-read-more hide">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="c-container">
                                <div class="c-content-title-1">
                                    <h3 class="c-font-uppercase c-font-bold c-font-white">Latest Works</h3>
                                    <div class="c-line-left hide">
                                    </div>
                                </div>
                                <ul class="c-works">
                                    <li class="c-first">
                                        <a href="#"><img src="assets/base/img/content/stock/015.jpg" alt="" class="img-responsive"/></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/base/img/content/stock/012.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                    <li class="c-last">
                                        <a href="#"><img src="assets/base/img/content/stock/12.jpg" alt="" class="img-responsive"/></a>
                                    </li>
                                </ul>
                                <ul class="c-works">
                                    <li class="c-first">
                                        <a href="#"><img src="assets/base/img/content/stock/014.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/base/img/content/stock/011.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                    <li class="c-last">
                                        <a href="#"><img src="assets/base/img/content/stock/15.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                </ul>
                                <ul class="c-works">
                                    <li class="c-first">
                                        <a href="#"><img src="assets/base/img/content/stock/015.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/base/img/content/stock/013.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                    <li class="c-last">
                                        <a href="#"><img src="assets/base/img/content/stock/13.jpg" class="img-responsive" alt=""/></a>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-md c-btn-border-1x c-theme-btn c-btn-uppercase c-btn-square c-btn-bold c-read-more hide">View More</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="c-container c-last">
                                <div class="c-content-title-1">
                                    <h3 class="c-font-uppercase c-font-bold c-font-white">Find us</h3>
                                    <div class="c-line-left hide">
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed elit diam nonummy ad minim.
                                    </p>
                                </div>
                                <ul class="c-socials">
                                    <li>
                                        <a href="#"><i class="icon-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-social-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-social-tumblr"></i></a>
                                    </li>
                                </ul>
                                <ul class="c-address">
                                    <li>
                                        <i class="icon-pointer c-theme-font"></i> One Boulevard, Beverly Hills
                                    </li>
                                    <li>
                                        <i class="icon-call-end c-theme-font"></i> +1800 1234 5678
                                    </li>
                                    <li>
                                        <i class="icon-envelope c-theme-font"></i> email@example.com
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-postfooter">
                <div class="container">
                    <p class="c-font-oswald c-font-14">
                        Copyright &copy; JANGO Inc.
                    </p>
                </div>
            </div>
        </footer>
        <!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
        <!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
        <div class="c-layout-go2top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END: LAYOUT/FOOTERS/GO2TOP -->
        <!-- BEGIN: LAYOUT/BASE/BOTTOM -->
        <!-- BEGIN: CORE PLUGINS -->
        <!--[if lt IE 9]>
                <script src="../assets/global/plugins/excanvas.min.js"></script> 
                <![endif]-->
        <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- END: CORE PLUGINS -->
        <!-- BEGIN: LAYOUT PLUGINS -->
        <script src="assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src="assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
        <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
        <script src="assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
        <!-- END: LAYOUT PLUGINS -->
        <!-- BEGIN: THEME SCRIPTS -->
        <script src="assets/base/js/components.js" type="text/javascript"></script>
        <script src="assets/base/js/app.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                App.init(); // init core   

                // init main slider
                var slider = $('.c-layout-revo-slider .tp-banner');
                var cont = $('.c-layout-revo-slider .tp-banner-container');
                var api = slider.show().revolution({
                    delay: 15000,
                    startwidth: 1170,
                    startheight: (App.getViewPort().width < App.getBreakpoint('md') ? 1024 : 620),
                    navigationType: "hide",
                    navigationArrows: "solo",
                    touchenabled: "on",
                    onHoverStop: "on",
                    keyboardNavigation: "off",
                    navigationStyle: "circle",
                    navigationHAlign: "center",
                    navigationVAlign: "center",
                    fullScreenAlignForce: "off",
                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",
                    spinner: "spinner2",
                    forceFullWidth: "on",
                    hideTimerBar: "on",
                    hideThumbsOnMobile: "on",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "on",
                    hideArrowsOnMobile: "on",
                    hideThumbsUnderResolution: 0,
                    videoJsPath: "rs-plugin/videojs/",
                });
            });
        </script>
        <!-- END: THEME SCRIPTS -->
        <!-- END: LAYOUT/BASE/BOTTOM -->
    </body>
</html>












