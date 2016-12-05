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
        <!-- BEGIN: CONTENT/USER/FORGET-PASSWORD-FORM -->
        <div class="modal fade c-content-login-form" id="forget-password-form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content c-square">
                    <div class="modal-header c-no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="c-font-24 c-font-sbold">Password Recovery</h3>
                        <p>
                            To recover your password please fill in your email address
                        </p>
                        <form>
                            <div class="form-group">
                                <label for="forget-email" class="hide">Email</label>
                                <input type="email" class="form-control input-lg c-square" id="forget-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Submit</button>
                                <a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">Back To Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer c-no-border">
                        <span class="c-text-account">Don't Have An Account Yet ?</span>
                        <a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Signup!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: CONTENT/USER/FORGET-PASSWORD-FORM -->
        <!-- BEGIN: CONTENT/USER/SIGNUP-FORM -->
        <div class="modal fade c-content-login-form" id="signup-form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content c-square">
                    <div class="modal-header c-no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="c-font-24 c-font-sbold">Create An Account</h3>
                        <p>
                            Please fill in below form to create an account with us
                        </p>
                        <form>
                            <div class="form-group">
                                <label for="signup-email" class="hide">Email</label>
                                <input type="email" class="form-control input-lg c-square" id="signup-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="signup-username" class="hide">Username</label>
                                <input type="email" class="form-control input-lg c-square" id="signup-username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="signup-fullname" class="hide">Fullname</label>
                                <input type="email" class="form-control input-lg c-square" id="signup-fullname" placeholder="Fullname">
                            </div>
                            <div class="form-group">
                                <label for="signup-country" class="hide">Country</label>
                                <select class="form-control input-lg c-square" id="signup-country">
                                    <option value="1">Country</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Signup</button>
                                <a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">Back To Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: CONTENT/USER/SIGNUP-FORM -->
        <!-- BEGIN: CONTENT/USER/LOGIN-FORM -->
        <div class="modal fade c-content-login-form" id="login-form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content c-square">
                    <div class="modal-header c-no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="c-font-24 c-font-sbold">Good Afternoon!</h3>
                        <p>
                            Let's make today a great day!
                        </p>
                        <form>
                            <div class="form-group">
                                <label for="login-email" class="hide">Email</label>
                                <input type="email" class="form-control input-lg c-square" id="login-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="login-password" class="hide">Password</label>
                                <input type="password" class="form-control input-lg c-square" id="login-password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="c-checkbox">
                                    <input type="checkbox" id="login-rememberme" class="c-check">
                                    <label for="login-rememberme" class="c-font-thin c-font-17">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Remember Me </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Login</button>
                                <a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">Forgot Your Password ?</a>
                            </div>
                            <div class="clearfix">
                                <div class="c-content-divider c-divider-sm c-icon-bg c-bg-grey c-margin-b-20">
                                    <span style="width: 110px">or signup with</span>
                                </div>
                                <ul class="c-content-list-adjusted">
                                    <li>
                                        <a class="btn btn-block c-btn-square btn-social btn-twitter">
                                            <i class="fa fa-twitter"></i>
                                            Twitter </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-block c-btn-square btn-social btn-facebook">
                                            <i class="fa fa-facebook"></i>
                                            Facebook </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-block c-btn-square btn-social btn-google">
                                            <i class="fa fa-google"></i>
                                            Google </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer c-no-border">
                        <span class="c-text-account">Don't Have An Account Yet ?</span>
                        <a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Signup!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: CONTENT/USER/LOGIN-FORM -->
        <!-- BEGIN: LAYOUT/SIDEBARS/QUICK-SIDEBAR -->
        <nav class="c-layout-quick-sidebar">
            <div class="c-header">
                <button type="button" class="c-link c-close">
                    <i class="icon-login"></i>
                </button>
            </div>
            <div class="c-content">
                <div class="c-section">
                    <h3>Theme Colors</h3>
                    <div class="c-settings">
                        <span class="c-color c-default c-active" data-color="default"></span>
                        <span class="c-color c-green1" data-color="green1"></span>
                        <span class="c-color c-green2" data-color="green2"></span>
                        <span class="c-color c-green3" data-color="green3"></span>
                        <span class="c-color c-yellow1" data-color="yellow1"></span>
                        <span class="c-color c-yellow2" data-color="yellow2"></span>
                        <span class="c-color c-yellow3" data-color="yellow3"></span>
                        <span class="c-color c-red1" data-color="red1"></span>
                        <span class="c-color c-red2" data-color="red2"></span>
                        <span class="c-color c-red3" data-color="red3"></span>
                        <span class="c-color c-purple1" data-color="purple1"></span>
                        <span class="c-color c-purple2" data-color="purple2"></span>
                        <span class="c-color c-purple3" data-color="purple3"></span>
                        <span class="c-color c-blue1" data-color="blue1"></span>
                        <span class="c-color c-blue2" data-color="blue2"></span>
                        <span class="c-color c-blue3" data-color="blue3"></span>
                        <span class="c-color c-brown1" data-color="brown1"></span>
                        <span class="c-color c-brown2" data-color="brown2"></span>
                        <span class="c-color c-brown3" data-color="brown3"></span>
                        <span class="c-color c-dark1" data-color="dark1"></span>
                        <span class="c-color c-dark2" data-color="dark2"></span>
                        <span class="c-color c-dark3" data-color="dark3"></span>
                    </div>
                </div>
                <div class="c-section">
                    <h3>Header Type</h3>
                    <div class="c-settings">
                        <input type="button" class="c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="boxed" value="boxed"/>
                        <input type="button" class="c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="fluid" value="fluid"/>
                    </div>
                </div>
                <div class="c-section">
                    <h3>Header Mode</h3>
                    <div class="c-settings">
                        <input type="button" class="c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="fixed" value="fixed"/>
                        <input type="button" class="c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="static" value="static"/>
                    </div>
                </div>
                <div class="c-section">
                    <h3>Mega Menu Style</h3>
                    <div class="c-settings">
                        <input type="button" class="c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="dark" value="dark"/>
                        <input type="button" class="c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="light" value="light"/>
                    </div>
                </div>
                <div class="c-section">
                    <h3>Font Style</h3>
                    <div class="c-settings">
                        <input type="button" class="c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="default" value="default"/>
                        <input type="button" class="c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="light" value="light"/>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: LAYOUT/SIDEBARS/QUICK-SIDEBAR -->
        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
            <section class="c-layout-revo-slider c-layout-revo-slider-4">
                <div class="tp-banner-container c-theme" style="height: 620px">
                    <div class="tp-banner">
                        <ul>
                            <!--BEGIN: SLIDE #1 -->
                            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                                <img alt="" src="assets/base/img/content/backgrounds/bg-43.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <div class="caption customin customout tp-resizeme" data-x="center" data-y="center" data-hoffset="" data-voffset="-50" data-speed="500" data-start="1000" data-customin="x:0;y:0;z:0;rotationX:0.5;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
                                    <h3 class="c-block-bordered c-font-48 c-font-bold c-font-center c-font-uppercase c-font-white c-block">
                                        TAKE THE WEB BY<br>
                                        STORM WITH JANGO </h3>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="center" data-y="center" data-voffset="110" data-speed="900" data-start="2000" data-easing="easeOutExpo">
                                    <a href="#" class="c-action-btn btn btn-lg c-btn-square c-theme-btn c-btn-bold c-btn-uppercase">Learn More</a>
                                </div>
                            </li>
                            <!--END -->
                            <!--BEGIN: SLIDE #2 -->
                            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                                <img alt="" src="assets/base/img/content/backgrounds/bg-20.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <div class="caption customin customout tp-resizeme" data-x="center" data-y="center" data-hoffset="" data-voffset="-50" data-speed="500" data-start="1000" data-customin="x:0;y:0;z:0;rotationX:0.5;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
                                    <h3 class="c-block-bordered c-font-48 c-font-bold c-font-center c-font-uppercase c-font-white c-block">
                                        JANGO IS OPTIMIZED<br>
                                        TO EVERY DEVELOPMENT </h3>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="center" data-y="center" data-voffset="110" data-speed="900" data-start="2000" data-easing="easeOutExpo">
                                    <a href="#" class="c-action-btn btn btn-lg c-btn-square c-theme-btn c-btn-bold c-btn-uppercase">Learn More</a>
                                </div>
                            </li>
                            <!--END -->
                            <!--BEGIN: SLIDE #3 -->
                            <li data-transition="fade" data-slotamount="1" data-masterspeed="700" data-delay="6000" data-thumb="">
                                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                                <img src="assets/base/img/layout/sliders/revo-slider/base/blank.png" alt="">
                                <div class="caption fulllscreenvideo tp-videolayer" data-x="0" data-y="0" data-speed="600" data-start="1000" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power4.easeOut" data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="true" data-videowidth="100%" data-videoheight="100%" data-videopreload="meta" data-videomp4="assets/base/media/video/video-2.mp4" data-videowebm="" data-videocontrols="none" data-forcecover="1" data-forcerewind="on" data-aspectratio="16:9" data-volume="mute" data-videoposter="assets/base/img/layout/sliders/revo-slider/base/blank.png">
                                </div>
                                <div class="caption customin customout tp-resizeme" data-x="center" data-y="center" data-hoffset="" data-voffset="-30" data-speed="500" data-start="1000" data-customin="x:0;y:0;z:0;rotationX:0.5;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
                                    <h3 class="c-block-bordered-square c-font-55 c-font-bold c-font-center c-font-uppercase c-font-white c-block">
                                        Let us show you<br>
                                        Unlimited possibilities </h3>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="center" data-y="center" data-voffset="130" data-speed="900" data-start="2000" data-easing="easeOutExpo">
                                    <a href="#" class="c-action-btn btn c-btn-square c-btn-border-2x c-btn-white c-btn-sbold c-btn-uppercase">Purchase</a>
                                </div>
                            </li>
                            <!--END -->
                        </ul>
                    </div>
                </div>
            </section>
            <!-- END: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
            <!-- BEGIN: CONTENT/FEATURES/FEATURES-1 -->
            <!-- BEGIN: FEATURES 1 -->
            <div class="c-content-box c-size-md c-bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="c-content-feature-1">
                                <div class="c-content-line-icon c-theme c-icon-screen-chart">
                                </div>
                                <h3 class="c-font-uppercase c-font-bold">Fully responsive</h3>
                                <p class="c-font-thin">
                                    Beautiful cinematic designs optimized for all screen sizes and types. Compatible with Retina high pixel density displays.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="c-content-feature-1">
                                <div class="c-content-line-icon c-theme c-icon-support">
                                </div>
                                <h3 class="c-font-uppercase c-font-bold">Visual & Pragmatic</h3>
                                <p class="c-font-thin">
                                    Featuring trending modern web standards.<br/>Clean and easy framework design for worry and hassle free customizations.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 c-card">
                            <div class="c-content-feature-1">
                                <div class="c-content-line-icon c-theme c-icon-bulb">
                                </div>
                                <h3 class="c-font-uppercase c-font-bold">Dedicated Support</h3>
                                <p class="c-font-thin">
                                    Quick response with regular updates.<br/>Each update will include great new features and enhancements for free.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: FEATURES 1 -->
            <!-- END: CONTENT/FEATURES/FEATURES-1 -->
            <!-- BEGIN: CONTENT/MISC/WHY-CHOOSE-US-1 -->
            <div class="c-content-box c-size-lg c-bg-grey-1">
                <div class="container">
                    <div class="">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="c-content-feature-5">
                                    <div class="c-content-title-1">
                                        <h3 class="c-left c-font-dark c-font-uppercase c-font-bold">Why<br/>JANGO ?</h3>
                                        <div class="c-line-left c-bg-blue-3 c-theme-bg">
                                        </div>
                                    </div>
                                    <div class="c-text">
                                        JANGO is the ultimate tool to power any of your projects. Corporate, ecommerce, SAAS, CRM and much more.
                                    </div>
                                    <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn">Explore</button>
                                    <img class="c-photo img-responsive" width="420" alt="" src="assets/base/img/content/misc/jango-intro-2.jpg"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="c-content-accordion-1 c-theme">
                                    <div class="panel-group" id="accordion" role="tablist">
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a class="c-font-bold c-font-uppercase c-font-19" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Exceptional Frontend Framework </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body c-font-18">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed c-font-uppercase c-font-bold c-font-19" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Modern Design Trends </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body c-font-18">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed c-font-uppercase c-font-bold c-font-19" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Beatifully Crafted Code </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body c-font-18">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/MISC/WHY-CHOOSE-US-1 -->
            <!-- BEGIN: CONTENT/TABS/TAB-1 -->
            <div class="c-content-box c-size-md c-no-bottom-padding c-overflow-hide">
                <div class="c-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="c-content-title-1">
                                <h3 class="c-font-34 c-font-center c-font-bold c-font-uppercase c-margin-b-30">
                                    JANGO'S Main Features </h3>
                                <div class="c-line-center c-theme-bg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="c-content-tab-2 c-theme c-opt-1">
                                <ul class="nav c-tab-icon-stack c-font-sbold c-font-uppercase">
                                    <li class="active">
                                        <a href="#c-tab2-opt1-1" data-toggle="tab">
                                            <span class="c-content-line-icon c-icon-25"></span>
                                            <span class="c-title">Design</span>
                                        </a>
                                        <div class="c-arrow">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-2" data-toggle="tab">
                                            <span class="c-content-line-icon c-icon-19"></span>
                                            <span class="c-title">Responsive</span>
                                        </a>
                                        <div class="c-arrow">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-3" data-toggle="tab">
                                            <span class="c-content-line-icon c-icon-14"></span>
                                            <span class="c-title">Support</span>
                                        </a>
                                        <div class="c-arrow">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-4" data-toggle="tab">
                                            <span class="c-content-line-icon c-icon-20"></span>
                                            <span class="c-title">Flexible</span>
                                        </a>
                                        <div class="c-arrow">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-5" data-toggle="tab">
                                            <span class="c-content-line-icon c-icon-33"></span>
                                            <span class="c-title">Structured</span>
                                        </a>
                                        <div class="c-arrow">
                                        </div>
                                    </li>
                                </ul>
                                <div class="c-tab-content">
                                    <div class="c-bg-img-center1" style="background-image: url(assets/base/img/content/backgrounds/bg-62.jpg)">
                                        <div class="container">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="c-tab2-opt1-1">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/3.jpg" alt=""/>
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Modern Design Trends</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin ">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit ad minim veniam, exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat exerci tation suscipit lobortis nisl ut laoreet dolore magna aliquam ut aliquip ex ea commodo consequat.
                                                        </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                            EXPLORE </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-2">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/04.jpg" alt=""/>
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Optimzied For All Screen Sizes & Types</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin ">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                        </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                            EXPLORE </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-3">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/5.jpg" alt=""/>
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Dedicated Support To All Customers</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin ">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit enim ad minim veniam lobortis nisl ut aliquip ex ea commodo consequat exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                        </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                            EXPLORE </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-4">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/06.jpg" alt=""/>
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Coded By Developers For Developers</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin ">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed enim ad minim veniam diam nonummy nibh euismod tincidunt ut enim ad minim veniam laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                        </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                            EXPLORE </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-5">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/6.jpg" alt=""/>
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Unlimited Flexible Multi-purpose Layouts & Components</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin ">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed enim ad minim veniam diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat enim ad minim veniam.
                                                        </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                            EXPLORE </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/TABS/TAB-1 -->
            <!-- BEGIN: CONTENT/MISC/LATEST-ITEMS-1 -->
            <div class="c-content-box c-size-md c-bg-grey-1">
                <div class="container">
                    <div class="row" data-auto-height="true">
                        <div class="col-md-4 c-margin-b-30">
                            <div class="c-content-media-1" data-height="height">
                                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                    Blog
                                </div>
                                <a href="#" class="c-title c-font-uppercase c-font-bold c-theme-on-hover">Take the web by storm with JANGO</a>
                                <p>
                                    Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat
                                </p>
                                <div class="c-author">
                                    <div class="c-portrait" style="background-image: url(assets/base/img/content/team/team1.jpg)">
                                    </div>
                                    <div class="c-name c-font-uppercase">
                                        Jack Nilson
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 c-margin-b-30">
                            <div class="c-content-media-1" data-height="height">
                                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                    News
                                </div>
                                <a href="#" class="c-title c-font-uppercase c-font-bold c-theme-on-hover">The Multi-purpose HTML5 Theme</a>
                                <p>
                                    Lorem ipsum dolor sit amet, coectetuer diam nonummy adipiscing elit sit amet, sit amet, coectetuer adipiscing elit adipiscing consectetuer
                                </p>
                                <div class="c-date">
                                    27 Jan 2015
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 c-margin-b-30">
                            <div class="c-content-v-center c-theme-bg" data-height="height">
                                <div class="c-wrapper">
                                    <div class="c-body c-center">
                                        <h3 class="c-font-25 c-line-height-34 c-font-white c-font-uppercase c-font-bold">
                                            Nothing is impossible for JANGO. Highly Flexible, always growing</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="c-content-media-2-slider" data-slider="owl" data-single-item="true" data-auto-play="4000">
                                <div class="c-content-label c-font-uppercase c-font-bold">
                                    Latest Uploads
                                </div>
                                <div class="owl-carousel owl-theme c-theme owl-single">
                                    <div class="item">
                                        <div class="c-content-media-2 c-bg-img-center" style="background-image: url(assets/base/img/content/stock3/18.jpg); min-height: 360px;">
                                            <div class="c-panel">
                                                <div class="c-fav">
                                                    <i class="icon-heart c-font-thin"></i>
                                                    <p class="c-font-thin">
                                                        16
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="c-content-media-2 c-bg-img-center" style="background-image: url(assets/base/img/content/stock3/22.jpg); min-height: 360px;">
                                            <div class="c-panel">
                                                <div class="c-fav">
                                                    <i class="icon-heart c-font-thin"></i>
                                                    <p class="c-font-thin">
                                                        24
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="c-content-media-2 c-bg-img-center" style="background-image: url(assets/base/img/content/stock3/32.jpg); min-height: 360px;">
                                            <div class="c-panel">
                                                <div class="c-fav">
                                                    <i class="icon-heart c-font-thin"></i>
                                                    <p class="c-font-thin">
                                                        19
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="c-content-testimonial-2-slider" data-slider="owl" data-single-item="true" data-auto-play="6000">
                                <div class="c-title c-font-uppercase c-theme-bg">
                                    Testimonials
                                </div>
                                <div class="owl-carousel owl-theme c-theme owl-single">
                                    <div class="item">
                                        <div class="c-content-testimonial-2" style="min-height: 360px;">
                                            <div class="c-testimonial c-font-bold c-font-uppercase">
                                                JANGO the best HTML theme I've purchased in months!
                                            </div>
                                            <div class="c-author">
                                                <div class="c-portrait" style="background-image: url(assets/base/img/content/team/team13.jpg)">
                                                </div>
                                                <div class="c-name c-font-uppercase">
                                                    Jim Cook
                                                </div>
                                                <p class="c-position c-theme c-font-uppercase">
                                                    Orange Inc.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="c-content-testimonial-2" style="min-height: 360px;">
                                            <div class="c-testimonial c-font-bold c-font-uppercase">
                                                Quick and extremely easy to use with awesome customer support
                                            </div>
                                            <div class="c-author">
                                                <div class="c-portrait" style="background-image: url(assets/base/img/content/team/team6.jpg)">
                                                </div>
                                                <div class="c-name c-font-uppercase">
                                                    Jane Smith
                                                </div>
                                                <p class="c-position c-theme c-font-uppercase">
                                                    Loop Inc.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/MISC/LATEST-ITEMS-1 -->
            <!-- BEGIN: CONTENT/BARS/BAR-5 -->
            <div class="c-content-box c-size-md c-bg-parallax" style="background-image: url(assets/base/img/content/backgrounds/bg-13.jpg)">
                <div class="container">
                    <div class="c-content-bar-4">
                        <h3 class="c-font-uppercase c-font-bold">Clean HTML & CSS<br/>JANGO is Launch Ready</h3>
                        <div class="c-actions">
                            <a href="#" class="btn btn-md c-btn-border-2x c-btn-square c-btn-white c-btn-uppercase c-btn-bold c-margin-b-100">Learn More</a>
                            <a href="#" class="btn btn-md c-theme-btn c-btn-square c-btn-uppercase c-btn-bold c-theme-btn c-margin-b-100 hide">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/BARS/BAR-5 -->
            <!-- BEGIN: CONTENT/MISC/SUBSCRIBE-FORM-1 -->
            <div class="c-content-box c-size-sm c-bg-dark">
                <div class="container">
                    <div class="c-content-subscribe-form-1">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="c-title c-font-30 c-font-uppercase c-font-bold">Subscribe to our newsletter</h3>
                                <div class="c-body c-font-16 c-font-uppercase c-font-sbold">
                                    Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <form action="#">
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control input-lg" placeholder="Your Email Here">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">SUBSCRIBE</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/MISC/SUBSCRIBE-FORM-1 -->
            <!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
            <div class="c-content-box c-size-md c-bg-white c-no-bottom-padding">
                <div class="container">
                    <div class="c-content-product-1 c-opt-1">
                        <div class="c-content-title-1">
                            <h3 class="c-center c-font-uppercase c-font-bold">Learn More About JANGO</h3>
                            <div class="c-line-center">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="c-media">
                                    <img src="assets/base/img/content/misc/jango-intro-3.png" alt=""/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="c-body">
                                    <ul class="c-row">
                                        <li>
                                            <h4>Code Quality</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod
                                            </p>
                                        </li>
                                        <li>
                                            <h4>Angular JS Support</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod
                                            </p>
                                        </li>
                                    </ul>
                                    <ul class="c-row">
                                        <li>
                                            <h4>Every Growing Unique Layouts</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod
                                            </p>
                                        </li>
                                        <li>
                                            <h4>Fully Mobile Optimized</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod
                                            </p>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-md c-btn-border-2x c-btn-square c-btn-regular c-btn-uppercase c-btn-bold c-margin-b-100">Learn More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/PRODUCTS/PRODUCT-1 -->
            <!-- BEGIN: CONTENT/PRICING/PRICING-1 -->
            <div class="c-content-box c-size-md c-bg-grey-1">
                <div class="container">
                    <div class="c-content-pricing-1">
                        <div class="c-content-title-1">
                            <h3 class="c-center c-font-uppercase c-font-bold">Purchase a Package</h3>
                            <div class="c-line-center">
                            </div>
                        </div>
                        <div class="c-tile-container">
                            <div class="c-tile c-tile-small">
                                <div class="c-label c-theme-bg">
                                    Standard
                                </div>
                                <p class="c-price">
                                    59<sup>$</sup>
                                </p>
                                <p class="c-font-uppercase">
                                    1000 Copies
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Data
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Users
                                </p>
                                <p class="c-font-uppercase">
                                    For 7 days
                                </p>
                                <button type="button" class="btn btn-md c-btn-square c-btn-border-2x c-btn-regular c-btn-uppercase c-btn-bold">Purchase</button>
                            </div>
                            <div class="c-tile">
                                <div class="c-label c-theme-bg">
                                    Business
                                </div>
                                <p class="c-price">
                                    99<sup>$</sup>
                                </p>
                                <p class="c-font-uppercase">
                                    10,000 Copies
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Data
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Users
                                </p>
                                <p class="c-font-uppercase">
                                    For 30 days
                                </p>
                                <button type="button" class="btn btn-md c-btn-square c-btn-border-2x c-btn-regular c-btn-uppercase c-btn-bold">Purchase</button>
                            </div>
                            <div class="c-tile c-tile-small">
                                <div class="c-label c-theme-bg">
                                    Expert
                                </div>
                                <p class="c-price">
                                    199<sup>$</sup>
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Copies
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Data
                                </p>
                                <p class="c-font-uppercase">
                                    Unlimited Users
                                </p>
                                <p class="c-font-uppercase">
                                    For 1 Year
                                </p>
                                <button type="button" class="btn btn-md c-btn-square c-btn-border-2x c-btn-regular c-btn-uppercase c-btn-bold">Purchase</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/PRICING/PRICING-1 -->
            <!-- BEGIN: CONTENT/SLIDERS/CLIENT-LOGOS-2 -->
            <div class="c-content-box c-size-md c-bg-white">
                <div class="container">
                    <!-- Begin: Testimonals 1 component -->
                    <div class="c-content-client-logos-slider-1 c-bordered" data-slider="owl" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="2" data-auto-play="5000">
                        <!-- Begin: Title 1 component -->
                        <div class="c-content-title-1">
                            <h3 class="c-center c-font-uppercase c-font-bold">Happy Customers</h3>
                            <div class="c-line-center c-theme-bg">
                            </div>
                        </div>
                        <!-- End-->
                        <!-- Begin: Owlcarousel -->
                        <div class="owl-carousel owl-theme c-theme owl-bordered1">
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client1.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client2.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client3.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client4.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client5.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client6.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client5.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client6.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client5.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client6.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client5.jpg" alt=""/></a>
                            </div>
                            <div class="item">
                                <a href="#"><img src="assets/base/img/content/client-logos/client6.jpg" alt=""/></a>
                            </div>
                        </div>
                        <!-- End-->
                    </div>
                    <!-- End-->
                </div>
            </div>
            <!-- END: CONTENT/SLIDERS/CLIENT-LOGOS-2 -->
            <!-- END: PAGE CONTENT -->
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
