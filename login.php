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
        $check = '<div class="alert alert-success">Bentornato!</div>';
        header("location: controllo.php");
    } else {
        $check = '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Errore:</span>Password o Login errata</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/mystyle.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="http://jango.nikadevs.com/sites/all/themes/jango/jango_sub/favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortlink" href="/node/2" />
        <link rel="canonical" href="/content/front" />
        <meta name="Generator" content="Drupal 7 (http://drupal.org)" />
        <style type="text/css" media="all">
            @import url("http://jango.nikadevs.com/modules/system/system.base.css?oh0l2u");
        </style>
        <style type="text/css" media="all">
            @import url("http://jango.nikadevs.com/modules/comment/comment.css?oh0l2u");
            @import url("http://jango.nikadevs.com/modules/field/theme/field.css?oh0l2u");
            @import url("http://jango.nikadevs.com/modules/node/node.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/modules/views/css/views.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/modules/ckeditor/css/ckeditor.css?oh0l2u");
        </style>
        <style type="text/css" media="all">
            @import url("http://jango.nikadevs.com/sites/all/modules/ctools/css/ctools.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/modules/md_slider/css/animate.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/modules/md_slider/css/md-slider.css?oh0l2u");
        </style>
        <style type="text/css" media="all">
            <!--/*--><![CDATA[/*><!--*/
            .md-layer-1-0-0{z-index:1000 !important;color:#ffffff !important;font-size:4em;font-weight:700;font-family:"Roboto Condensed";}.md-layer-1-1-0{z-index:1000 !important;}.md-layer-1-2-0{z-index:999 !important;}.md-layer-1-2-1{z-index:1000 !important;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px;}

            /*]]>*/-->
        </style>
        <style type="text/css" media="all">
            @import url("http://jango.nikadevs.com/sites/all/modules/md_slider/css/md-slider-style.css?oh0l2u");
        </style>
        <style type="text/css" media="all">
            <!--/*--><![CDATA[/*><!--*/
            @media (max-width:460px){.hideonmobile{display:none !important;}}

            /*]]>*/-->
        </style>
        <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;amp;subset=all" media="all" />
        <style type="text/css" media="all">
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/socicon/socicon.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/bootstrap-social/bootstrap-social.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/font-awesome/css/font-awesome.min.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/simple-line-icons/simple-line-icons.min.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/animate/animate.min.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/bootstrap/css/bootstrap.min.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/cubeportfolio/css/cubeportfolio.min.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/owl-carousel/owl.carousel.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/owl-carousel/owl.theme.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/owl-carousel/owl.transitions.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/fancybox/jquery.fancybox.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/slider-for-bootstrap/css/slider.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/ilightbox/css/ilightbox.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/base/css/plugins.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/base/css/components.css?oh0l2u");
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/css/drupal.css?oh0l2u");
        </style>
        <style type="text/css" media="all">
            @import url("http://jango.nikadevs.com/sites/all/themes/jango/assets/base/css/themes/default.css?oh0l2u");
        </style>
        <title>infobasic - brief</title>
    </head>
    <body class="html front not-logged-in no-sidebars page-node page-node- page-node-2 node-type-page c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse c-header-not-fixed " >
        <div id="skip-link">
            <a href="#main-content" class="element-invisible element-focusable">Skip to main content</a>
        </div>



        <div  class="nd-region">



            <div class = "container-fluid">

                <div  id="Header-FullWidth" class="row">     


                    <div  id="top" class="col-md-12 ">

                        <div class="region region-top">
                            <div id="block-block-1" class="block block-block">


                                <div class="content">
                                    <header class="c-layout-header c-layout-header-4 c-layout-header-dark-mobile " data-minimize-offset="80">

                                        <div class="c-topbar c-topbar-light c-solid-bg">
                                            <div class="container">
                                                <!-- BEGIN: INLINE NAV -->

                                                <nav class="c-top-menu c-pull-left">
                                                    <ul class="c-icons c-theme-ul">
                                                        <li><a href = "http://dribbble.com"><i class = "icon-social-dribbble"></i></a></li><li><a href = "http://facebook.com"><i class = "icon-social-facebook"></i></a></li><li><a href = "http://www.twitter.com"><i class = "icon-social-twitter"></i></a></li>            </ul>
                                                </nav>
                                                <!-- END: INLINE NAV -->
                                                <!-- BEGIN: INLINE NAV -->
                                                <nav class="c-top-menu c-pull-right">
                                                    <ul class="c-links c-theme-ul">
                                                        <li  class="first leaf"><a href="login.php" title="" class="active">Login</a></li>
                                                        <li class="c-divider">|</li><li  class="leaf"><a href="/" title="" class="active">Contact</a></li>
                                                        <li class="c-divider">|</li><li  class="last leaf"><a href="/" title="" class="active">FAQ</a></li>
                                                    </ul>


                                                    <ul class="c-ext c-theme-ul">
                                                        <li class="c-lang dropdown c-last">
                                                            <a href="#">en</a>
                                                            <ul class="dropdown-menu pull-right"><li class="en first active"><a href="/" class="language-link active" xml:lang="en">English</a></li>
                                                                <li class="fr"><a href="/fr" class="language-link" xml:lang="fr">Français</a></li>
                                                                <li class="de"><a href="/de" class="language-link" xml:lang="de">Deutsch</a></li>
                                                                <li class="ar last"><a href="/ar" class="language-link" xml:lang="ar">العربية</a></li>
                                                            </ul>                </li>
                                                    </ul>
                                                </nav>
                                                <!-- END: INLINE NAV -->
                                            </div>
                                        </div>

                                        <div class="c-navbar">
                                            <div class="container">
                                                <!-- BEGIN: BRAND -->
                                                <div class="c-navbar-wrapper clearfix">
                                                    <div class="c-brand c-pull-left">
                                                        <a href="/" class="c-logo">
                                                            <img src="img/logo-infobasic.png" width="168" height="50">
                                                           <!-- <img src="img/logo-infobasic.png" width="172" height="50" alt="Jango" class="c-desktop-logo-inverse">-->
                                                            <img src="img/logo-infobasic.png" width="160" height="40" alt="Jango" class="c-mobile-logo"> </a>
                                                        <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                                                            <span class="c-line"></span>
                                                            <span class="c-line"></span>
                                                            <span class="c-line"></span>
                                                        </button>
                                                        <button class="c-topbar-toggler" type="button">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>
                                                        <button class="c-search-toggler" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                        <button class="c-cart-toggler" type="button">
                                                            <i class="icon-handbag"></i>
                                                            <span class="c-cart-number c-theme-bg">2</span>
                                                        </button>
                                                    </div>
                                                    <form class="form" action="/" method="post" id="search-block-form" accept-charset="UTF-8"><div><div class="container-inline">
                                                                <h2 class="element-invisible">Search form</h2>
                                                                <div class = "input-group"><div class = "c-quick-search">
                                                                        <input title="Enter the terms you wish to search for." class="input-default form-control" placeholder="Type to search..." id="edit-search-block-form--2" name="search_block_form" value="" size="15" maxlength="128" />
                                                                        <span class="c-theme-link">×</span>
                                                                    </div><div class="form-actions hidden form-wrapper" id="edit-actions"><input class="btn-medium btn btn-mod form-submit btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white" type="submit" id="edit-submit" name="op" value="Go!" /></div></div><input type="hidden" name="form_build_id" value="form-2dA5lDVtHxQzOCGyisIFM1lugeST3JTtBXJeiCaSWXg" />
                                                                <input type="hidden" name="form_id" value="search_block_form" />
                                                            </div>
                                                        </div></form>        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                                                    <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-mega-menu-onepage c-fonts-uppercase c-fonts-bold" data-onepage-animation-speed = "700">
                                                        <!-- Main Menu -->
                                                        <ul class="nav navbar-nav c-theme-nav">

                                                            <li  data-id="406" data-level="1" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="justify" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-1 mega mega-align-justify dropdown active active-trail c-active">

                                                                <a href="/"  class="dropdown-toggle c-link" title="Home">

                                                                    Home          <span class="c-arrow c-toggler"></span>
                                                                </a>

                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu c-menu-type-mega2 c-menu-type-fullwidth row">

                                                                    <li  data-class="" data-width="3" data-hidewcol="0" id="tb-megamenu-column-1" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">
                                                                            <li class = "mega-caption"><h3>Home Samples</h3></li>

                                                                            <li  data-id="411" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Home Samples" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/"  title="Home version 1">

                                                                                    Home version 1      </a>

                                                                            </li>


                                                                            <li  data-id="412" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-2" >

                                                                                    Home version 2      </a>

                                                                            </li>


                                                                            <li  data-id="413" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-3" >

                                                                                    Home version 3      </a>

                                                                            </li>


                                                                            <li  data-id="414" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-4" >

                                                                                    Home version 4      </a>

                                                                            </li>


                                                                            <li  data-id="415" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-5" >

                                                                                    Home version 5      </a>

                                                                            </li>


                                                                            <li  data-id="416" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-6" >

                                                                                    Home version 6      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-2" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">
                                                                            <li class = "mega-caption"><h3>Home Samples</h3></li>

                                                                            <li  data-id="420" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Home Samples" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-7" >

                                                                                    Home version 7      </a>

                                                                            </li>


                                                                            <li  data-id="421" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-8" >

                                                                                    Home version 8      </a>

                                                                            </li>


                                                                            <li  data-id="422" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-9" >

                                                                                    Home version 9      </a>

                                                                            </li>


                                                                            <li  data-id="423" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-10" >

                                                                                    Home version 10      </a>

                                                                            </li>


                                                                            <li  data-id="424" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-11" >

                                                                                    Home version 11      </a>

                                                                            </li>


                                                                            <li  data-id="425" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/home-version-12" >

                                                                                    Home version 12      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-3" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">
                                                                            <li class = "mega-caption"><h3>OnePage Samples</h3></li>

                                                                            <li  data-id="427" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="OnePage Samples" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-1" >

                                                                                    Onepage version 1      </a>

                                                                            </li>


                                                                            <li  data-id="428" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-2" >

                                                                                    Onepage version 2      </a>

                                                                            </li>


                                                                            <li  data-id="429" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-3" >

                                                                                    Onepage version 3      </a>

                                                                            </li>


                                                                            <li  data-id="430" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-4" >

                                                                                    Onepage version 4      </a>

                                                                            </li>


                                                                            <li  data-id="431" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-5" >

                                                                                    Onepage version 5      </a>

                                                                            </li>


                                                                            <li  data-id="432" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-6" >

                                                                                    Onepage version 6      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-4" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">
                                                                            <li class = "mega-caption"><h3>OnePage Samples</h3></li>

                                                                            <li  data-id="434" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="OnePage Samples" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-7" >

                                                                                    Onepage version 7      </a>

                                                                            </li>


                                                                            <li  data-id="435" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-8" >

                                                                                    Onepage version 8      </a>

                                                                            </li>


                                                                            <li  data-id="436" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-9" >

                                                                                    Onepage version 9      </a>

                                                                            </li>


                                                                            <li  data-id="437" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-10" >

                                                                                    Onepage version 10      </a>

                                                                            </li>


                                                                            <li  data-id="438" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-11" >

                                                                                    Onepage version 11      </a>

                                                                            </li>


                                                                            <li  data-id="439" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/onepage-version-12" >

                                                                                    Onepage version 12      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>


                                                            <li  data-id="407" data-level="1" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-1 mega dropdown">

                                                                <a href="/content/features"  class="dropdown-toggle c-link">

                                                                    Esami          <span class="c-arrow c-toggler"></span>
                                                                </a>

                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu c-menu-type-classic c-pull-left">

                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-12" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">

                                                                            <li  data-id="955" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega dropdown-submenu">

                                                                                <a href="/content/about-us-1"  class="dropdown-toggle" title="Breadcrumbs">

                                                                                    Breadcrumbs          <span class="c-arrow c-toggler"></span>
                                                                                </a>

                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu dropdown-menu c-menu-type-inline">

                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-5" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-2 items-12">

                                                                                            <li  data-id="956" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/content/about-us-1"  title="Breadcrumbs - Default">

                                                                                                    Breadcrumbs - Default      </a>

                                                                                            </li>


                                                                                            <li  data-id="957" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/2"  title="Breadcrumbs - Sub Title">

                                                                                                    Breadcrumbs - Sub Title      </a>

                                                                                            </li>


                                                                                            <li  data-id="958" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/3"  title="Breadcrumbs - BG Image V1">

                                                                                                    Breadcrumbs - BG Image V1      </a>

                                                                                            </li>


                                                                                            <li  data-id="959" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/4"  title="Breadcrumbs - BG Image V2">

                                                                                                    Breadcrumbs - BG Image V2      </a>

                                                                                            </li>


                                                                                            <li  data-id="960" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/5"  title="Breadcrumbs - BG Image V3">

                                                                                                    Breadcrumbs - BG Image V3      </a>

                                                                                            </li>


                                                                                            <li  data-id="961" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/6"  title="Breadcrumbs - BG Image V4">

                                                                                                    Breadcrumbs - BG Image V4      </a>

                                                                                            </li>


                                                                                            <li  data-id="962" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/7"  title="Breadcrumbs - BG Image V5">

                                                                                                    Breadcrumbs - BG Image V5      </a>

                                                                                            </li>


                                                                                            <li  data-id="963" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/8"  title="Breadcrumbs - BG Image V6">

                                                                                                    Breadcrumbs - BG Image V6      </a>

                                                                                            </li>


                                                                                            <li  data-id="964" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/9"  title="Breadcrumbs - BG Image V7">

                                                                                                    Breadcrumbs - BG Image V7      </a>

                                                                                            </li>


                                                                                            <li  data-id="965" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/10"  title="Breadcrumbs - BG Image V8">

                                                                                                    Breadcrumbs - BG Image V8      </a>

                                                                                            </li>


                                                                                            <li  data-id="966" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/11"  title="Breadcrumbs - BG Image V9">

                                                                                                    Breadcrumbs - BG Image V9      </a>

                                                                                            </li>


                                                                                            <li  data-id="967" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/77/12"  title="Breadcrumbs - BG Image V10">

                                                                                                    Breadcrumbs - BG Image V10      </a>

                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>


                                                                            <li  data-id="971" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega dropdown-submenu">

                                                                                <a href="/node/2/header/v1"  class="dropdown-toggle" title="Headers">

                                                                                    Headers          <span class="c-arrow c-toggler"></span>
                                                                                </a>

                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu dropdown-menu c-menu-type-inline">

                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-6" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-2 items-13">

                                                                                            <li  data-id="972" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v1"  title="Home Header V1">

                                                                                                    Home Header V1      </a>

                                                                                            </li>


                                                                                            <li  data-id="985" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v1-extended"  title="Home Header V1 - Extended">

                                                                                                    Home Header V1 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="973" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v2"  title="Home Header V2">

                                                                                                    Home Header V2      </a>

                                                                                            </li>


                                                                                            <li  data-id="986" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v2-extended"  title="Home Header V2 - Extended">

                                                                                                    Home Header V2 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="974" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v3"  title="Home Header V3">

                                                                                                    Home Header V3      </a>

                                                                                            </li>


                                                                                            <li  data-id="975" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v4"  title="Home Header V4">

                                                                                                    Home Header V4      </a>

                                                                                            </li>


                                                                                            <li  data-id="987" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v4-extended"  title="Home Header V4 - Extended">

                                                                                                    Home Header V4 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="976" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v5"  title="Home Header V5">

                                                                                                    Home Header V5      </a>

                                                                                            </li>


                                                                                            <li  data-id="988" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v5-extended"  title="Home Header V5 - Extended">

                                                                                                    Home Header V5 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="977" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v6"  title="Home Header V6">

                                                                                                    Home Header V6      </a>

                                                                                            </li>


                                                                                            <li  data-id="989" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v6-extended"  title="Home Header V6 - Extended">

                                                                                                    Home Header V6 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="978" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v7"  title="Home Header V7">

                                                                                                    Home Header V7      </a>

                                                                                            </li>


                                                                                            <li  data-id="979" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/2/header/v8"  title="Home Header V8">

                                                                                                    Home Header V8      </a>

                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>


                                                                            <li  data-id="992" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega dropdown-submenu">

                                                                                <a href="/node/78/inner-header/v1"  class="dropdown-toggle" title="Inner Headers">

                                                                                    Inner Headers          <span class="c-arrow c-toggler"></span>
                                                                                </a>

                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu dropdown-menu c-menu-type-inline">

                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-7" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-2 items-7">

                                                                                            <li  data-id="980" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v1"  title="Inner Header V1">

                                                                                                    Inner Header V1      </a>

                                                                                            </li>


                                                                                            <li  data-id="990" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v1-extended"  title="Inner Header V1 - Extended">

                                                                                                    Inner Header V1 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="981" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v2"  title="Inner Header V2">

                                                                                                    Inner Header V2      </a>

                                                                                            </li>


                                                                                            <li  data-id="991" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v2-extended"  title="Inner Header V2 - Extended">

                                                                                                    Inner Header V2 - Extended      </a>

                                                                                            </li>


                                                                                            <li  data-id="982" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v3"  title="Inner Header V3">

                                                                                                    Inner Header V3      </a>

                                                                                            </li>


                                                                                            <li  data-id="983" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v4"  title="Inner Header V4">

                                                                                                    Inner Header V4      </a>

                                                                                            </li>


                                                                                            <li  data-id="984" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/inner-header/v5"  title="Inner Header V5">

                                                                                                    Inner Header V5      </a>

                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>


                                                                            <li  data-id="1145" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega dropdown-submenu">

                                                                                <a href="/node/78/footer-1"  class="dropdown-toggle" title="Footers">

                                                                                    Footers          <span class="c-arrow c-toggler"></span>
                                                                                </a>

                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu dropdown-menu c-menu-type-inline">

                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-8" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-2 items-9">

                                                                                            <li  data-id="1146" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-1#footer"  title="Footer 1">

                                                                                                    Footer 1      </a>

                                                                                            </li>


                                                                                            <li  data-id="1147" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-2#footer"  title="Footer 2">

                                                                                                    Footer 2      </a>

                                                                                            </li>


                                                                                            <li  data-id="1148" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-3#footer"  title="Footer 3">

                                                                                                    Footer 3      </a>

                                                                                            </li>


                                                                                            <li  data-id="1149" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-4#footer"  title="Footer 4">

                                                                                                    Footer 4      </a>

                                                                                            </li>


                                                                                            <li  data-id="1150" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-5#footer"  title="Footer 5">

                                                                                                    Footer 5      </a>

                                                                                            </li>


                                                                                            <li  data-id="1151" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-6#footer"  title="Footer 6">

                                                                                                    Footer 6      </a>

                                                                                            </li>


                                                                                            <li  data-id="1152" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-7#footer"  title="Footer 7">

                                                                                                    Footer 7      </a>

                                                                                            </li>


                                                                                            <li  data-id="1153" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-8#footer"  title="Footer 8">

                                                                                                    Footer 8      </a>

                                                                                            </li>


                                                                                            <li  data-id="1154" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/node/78/footer-9#footer"  title="Footer 9">

                                                                                                    Footer 9      </a>

                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>


                                                                            <li  data-id="968" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega dropdown-submenu">

                                                                                <a href="/"  class="dropdown-toggle" title="Mega Menu">

                                                                                    Mega Menu          <span class="c-arrow c-toggler"></span>
                                                                                </a>

                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu dropdown-menu c-menu-type-inline">

                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-9" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-2 items-2">

                                                                                            <li  data-id="970" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/?mega_menu_bg_color=light"  title="Mega Menu - Light">

                                                                                                    Mega Menu - Light      </a>

                                                                                            </li>


                                                                                            <li  data-id="969" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/"  title="Mega Menu - Dark">

                                                                                                    Mega Menu - Dark      </a>

                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>


                                                                            <li  data-id="993" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega dropdown-submenu">

                                                                                <a href="/"  class="dropdown-toggle" title="Multi Level Menu">

                                                                                    Multi Level Menu          <span class="c-arrow c-toggler"></span>
                                                                                </a>

                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu dropdown-menu c-menu-type-inline">

                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-11" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-2 items-3">

                                                                                            <li  data-id="994" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/"  title="Example Link">

                                                                                                    Example Link      </a>

                                                                                            </li>


                                                                                            <li  data-id="995" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega">

                                                                                                <a href="/"  title="Example Link">

                                                                                                    Example Link      </a>

                                                                                            </li>


                                                                                            <li  data-id="996" data-level="3" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-3 mega dropdown-submenu">

                                                                                                <a href="/"  class="dropdown-toggle" title="Example Sub Menu">

                                                                                                    Example Sub Menu          <span class="c-arrow c-toggler"></span>
                                                                                                </a>

                                                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu">

                                                                                                    <li  data-class="" data-width="12" data-hidewcol="0" id="tb-megamenu-column-10" class="tb-megamenu-column megamenu-column-single col-md-12  mega-col-nav">
                                                                                                        <ul  class="tb-megamenu-subnav mega-nav level-3 items-2">

                                                                                                            <li  data-id="998" data-level="4" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-4 mega">

                                                                                                                <a href="/"  title="Example Link">

                                                                                                                    Example Link      </a>

                                                                                                            </li>


                                                                                                            <li  data-id="997" data-level="4" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-4 mega">

                                                                                                                <a href="/"  title="Example Link">

                                                                                                                    Example Link      </a>

                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>


                                                            <li  data-id="408" data-level="1" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="justify" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-1 mega mega-align-justify dropdown">

                                                                <a href="/content/pages"  class="dropdown-toggle c-link">

                                                                    Certificazioni          <span class="c-arrow c-toggler"></span>
                                                                </a>

                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu c-menu-type-mega2 c-menu-type-fullwidth row">

                                                                    <li  data-class="" data-width="3" data-hidewcol="0" id="tb-megamenu-column-13" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-5">
                                                                            <li class = "mega-caption"><h3>Page Samples 1</h3></li>

                                                                            <li  data-id="510" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Page Samples 1" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/about-us-1" >

                                                                                    About Us 1      </a>

                                                                            </li>


                                                                            <li  data-id="511" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/about-us-2" >

                                                                                    About Us 2      </a>

                                                                            </li>


                                                                            <li  data-id="1280" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/about-us-3" >

                                                                                    About Us 3      </a>

                                                                            </li>


                                                                            <li  data-id="1281" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/about-us-4" >

                                                                                    About Us 4      </a>

                                                                            </li>


                                                                            <li  data-id="1282" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/meet-team" >

                                                                                    Meet the team      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-14" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">
                                                                            <li class = "mega-caption"><h3>Page Samples 2</h3></li>

                                                                            <li  data-id="512" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Page Samples 2" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/contact-us-1" >

                                                                                    Contact Us 1      </a>

                                                                            </li>


                                                                            <li  data-id="513" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/contact-us-2" >

                                                                                    Contact Us 2      </a>

                                                                            </li>


                                                                            <li  data-id="1283" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/contact-us-3" >

                                                                                    Contact Us 3      </a>

                                                                            </li>


                                                                            <li  data-id="1284" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/faq" >

                                                                                    FAQ      </a>

                                                                            </li>


                                                                            <li  data-id="1285" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/faq-2" >

                                                                                    FAQ 2      </a>

                                                                            </li>


                                                                            <li  data-id="514" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/product-launch" >

                                                                                    Product Launch      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-15" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-6">
                                                                            <li class = "mega-caption"><h3>Gallery Pages</h3></li>

                                                                            <li  data-id="1161" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Gallery Pages" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-lightbox-gallery" >

                                                                                    Lightbox Gallery      </a>

                                                                            </li>


                                                                            <li  data-id="1157" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-fullwidth-gallery" >

                                                                                    Full width gallery      </a>

                                                                            </li>


                                                                            <li  data-id="1158" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-masonry-gallery"  title="Masonry Gallery">

                                                                                    Masonry Gallery      </a>

                                                                            </li>


                                                                            <li  data-id="1160" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-index-gallery" >

                                                                                    Gallery Index      </a>

                                                                            </li>


                                                                            <li  data-id="1156" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-4col-portfolio" >

                                                                                    4 Columns Portfolio      </a>

                                                                            </li>


                                                                            <li  data-id="1159" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-2col-portfolio" >

                                                                                    2 Columns Portfolio      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-16" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-5">
                                                                            <li class = "mega-caption"><h3>Blog Pages</h3></li>

                                                                            <li  data-id="1162" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Blog Pages" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/page-masonry-portfolio" >

                                                                                    Masonry Portfolio      </a>

                                                                            </li>


                                                                            <li  data-id="1163" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/extended-portfolio" >

                                                                                    Extended Portfolio      </a>

                                                                            </li>


                                                                            <li  data-id="516" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/blog-list-view" >

                                                                                    Blog list view      </a>

                                                                            </li>


                                                                            <li  data-id="1286" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/blog-grid-view" >

                                                                                    Blog Grid View      </a>

                                                                            </li>


                                                                            <li  data-id="823" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/blog-modern-purchase-design" >

                                                                                    Blog Single Post      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>


                                                            <li  data-id="409" data-level="1" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="justify" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-1 mega mega-align-justify dropdown">

                                                                <a href="contatti.html"  class="dropdown-toggle c-link">

                                                                    Contatti         <span class="c-arrow c-toggler"></span>
                                                                </a>

                                                                <ul  data-class="" data-width="" class="x11 dropdown-menu c-menu-type-mega2 c-menu-type-fullwidth row">

                                                                    <li  data-class="" data-width="3" data-hidewcol="0" id="tb-megamenu-column-17" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-7">
                                                                            <li class = "mega-caption"><h3>Shop Pages 1</h3></li>

                                                                            <li  data-id="906" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Shop Pages 1" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-1" >

                                                                                    Shop Home 1      </a>

                                                                            </li>


                                                                            <li  data-id="907" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-2" >

                                                                                    Shop Home 2      </a>

                                                                            </li>


                                                                            <li  data-id="908" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-3" >

                                                                                    Shop Home 3      </a>

                                                                            </li>


                                                                            <li  data-id="909" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-4" >

                                                                                    Shop Home 4      </a>

                                                                            </li>


                                                                            <li  data-id="910" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-5" >

                                                                                    Shop Home 5      </a>

                                                                            </li>


                                                                            <li  data-id="911" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-6" >

                                                                                    Shop Home 6      </a>

                                                                            </li>


                                                                            <li  data-id="912" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-home-7" >

                                                                                    Shop Home 7      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-18" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-7">
                                                                            <li class = "mega-caption"><h3>Shop Pages 2</h3></li>

                                                                            <li  data-id="708" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Shop Pages 2" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/product-list/left-sidebar" >

                                                                                    Product List      </a>

                                                                            </li>


                                                                            <li  data-id="710" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/shop-product-grid/left-sidebar" >

                                                                                    Product Grid      </a>

                                                                            </li>


                                                                            <li  data-id="711" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/product-search/shop/left-sidebar" >

                                                                                    Product Search      </a>

                                                                            </li>


                                                                            <li  data-id="703" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/warm-winter-jacket" >

                                                                                    Product Details 1      </a>

                                                                            </li>


                                                                            <li  data-id="678" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/node/95/shop/left-sidebar"  title="Product Details 2">

                                                                                    Product Details 2      </a>

                                                                            </li>


                                                                            <li  data-id="902" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/cart"  title="Shopping Cart">

                                                                                    Shopping Cart      </a>

                                                                            </li>


                                                                            <li  data-id="904" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/cart/empty" >

                                                                                    Shopping Cart (Empty)      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-19" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-3">

                                                                            <li  data-id="707" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/user/register"  title="Customer Login/Register">

                                                                                    Customer Login/Register      </a>

                                                                            </li>


                                                                            <li  data-id="819" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/compare/shop/left-sidebar" >

                                                                                    Product Comparison      </a>

                                                                            </li>


                                                                            <li  data-id="866" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/wishlist/left-sidebar" >

                                                                                    Wish List      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li  data-class="" data-width="3" data-hidewcol="" id="tb-megamenu-column-20" class="tb-megamenu-column col-md-3  mega-col-nav">
                                                                        <ul  class="tb-megamenu-subnav mega-nav level-1 items-7">
                                                                            <li class = "mega-caption"><h3>Shop Components</h3></li>

                                                                            <li  data-id="699" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="Shop Components" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-components-1" >

                                                                                    Shop Components 1      </a>

                                                                            </li>


                                                                            <li  data-id="680" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-components-2" >

                                                                                    Shop Components 2      </a>

                                                                            </li>


                                                                            <li  data-id="681" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/products-split"  title="Shop Components 3">

                                                                                    Shop Components 3      </a>

                                                                            </li>


                                                                            <li  data-id="700" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-components-4" >

                                                                                    Shop Components 4      </a>

                                                                            </li>


                                                                            <li  data-id="701" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-components-5" >

                                                                                    Shop Components 5      </a>

                                                                            </li>


                                                                            <li  data-id="702" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-components-6" >

                                                                                    Shop Components 6      </a>

                                                                            </li>


                                                                            <li  data-id="1301" data-level="2" data-type="menu_item" data-class="" data-xicon="" data-caption="" data-alignsub="" data-group="0" data-hidewcol="0" data-hidesub="0" class="tb-megamenu-item level-2 mega">

                                                                                <a href="/content/shop-components-7" >

                                                                                    Shop Components 7      </a>

                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>






                                                            <li class="c-search-toggler-wrapper">
                                                                <a href="#" class="c-btn-icon c-search-toggler">
                                                                    <i class="fa fa-search"></i>
                                                                </a>
                                                            </li>
                                                            <li class="c-cart-toggler-wrapper">
                                                                <a href="/cart" class="c-btn-icon c-cart-toggler">
                                                                    <i class="icon-handbag c-cart-icon"></i>
                                                                    <span class="c-cart-number c-theme-bg">0</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="registrazioneUtente.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                                                    <i class="icon-user"></i> Registrati </a>
                                                            </li>

                                                            <li class="c-quick-sidebar-toggler-wrapper">
                                                                <a href="#" class="c-quick-sidebar-toggler">
                                                                    <span class="c-line"></span>
                                                                    <span class="c-line"></span>
                                                                    <span class="c-line"></span>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </nav>
                                                </div>
                                                <div id="block-commerce-cart-cart" class="block block-commerce-cart">


                                                    <div class="content">
                                                        <div class="cart-empty-block">Your shopping cart is empty.</div>  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header>



                                    <div id="block-block-10" class="block block-block">


                                        <div class="content">
                                            <div  class = 'c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both '>
                                                <div class = "c-breadcrumbs-wrapper">
                                                    <div class="container">
                                                        <div class="c-page-title c-pull-left">
                                                            <h3 class="c-font-uppercase c-font-sbold">My Profile</h3>

                                                        </div>
                                                        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular"><li><a href="/">Home</a></li><li>/</li><li class="c-state_active">My Profile</li></ul>
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



                <div  class="nd-region">



                    <div class = "container">

                        <div  id="Main-Content" class="row">     






                            <div  id="content" class="col-md-12 ">






                                <!--<form action = "" method = "post" class="form-signin">
                                    <h2>Per favore accedi</h2>
                                    <label for="inputEmail" class="sr-only">Indirizzo Email</label>
                                    <input type = "text" name = "username" placeholder="Email address" required autofocus>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type = "password" name = "password" placeholder="Password" required>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="remember-me"> Ricordami
                                        </label>
                                    </div>
                                    <button type="submit">Accedi</button>
                                </form>-->

                                <?php
                                if (isset($check)) {
                                    echo $check;
                                }
                                ?>  




                                <div  id="content" class="col-md-12 ">             


                                    <div class="region region-content">
                                        <div id="block-system-main" class="block block-system">


                                            <div class="content">
                                                <form action = "" method = "post" class="form-signin">
                                                    <div><div class="c-shop-login-register-1">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="panel panel-default c-panel">
                                                                        <div class="panel-body c-panel-body">
                                                                            <div class="form-item form-type-textfield form-item-name">
                                                                                <div class = "form-group has-feedback">
                                                                                    <input placeholder="Username" type="text" class="form-control c-square c-theme input-lg required" id="edit-name" name="username" value="" size="60" maxlength="60" />
                                                                                    <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span></div>
                                                                            </div>
                                                                            <div class="form-item form-type-password form-item-pass">
                                                                                <div class = "form-group has-feedback"><input placeholder="Password" type="password" id="edit-pass" name="password" value="" size="60" maxlength="128" class="form-control c-square c-theme input-lg required" /><span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span></div>
                                                                            </div>
                                                                            <input type="hidden" name="form_build_id" value="form-zD-hshjIOggAoS2L75iRWYc48SZEX0Uuip5gNSzVusA" />
                                                                            <input type="hidden" name="form_id" value="user_login" />
                                                                            <div class="form-actions form-wrapper" id="edit-actions"><input class="btn-medium btn btn-mod form-submit btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white" type="submit" id="edit-submit" name="op" value="Log in" /></div>        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="panel panel-default c-panel">
                                                                        <div class="panel-body c-panel-body">
                                                                            <div class="c-content-title-1">
                                                                                <h3 class="c-left">
                                                                                    <i class="icon-user"></i>Don't have an account yet?</h3>
                                                                                <div class="c-line-left c-theme-bg"></div>
                                                                                <p>Join us and enjoy shopping online today.</p>
                                                                            </div>
                                                                            <div class="c-margin-fix">
                                                                                <div class="form-item form-type-checkbox form-item-toggle-checkbox">
                                                                                    <div class="c-checkbox c-toggle-hide"  data-animation-speed="600">
                                                                                        <input type="checkbox" id="edit-toggle-checkbox" name="toggle_checkbox" value="1" class="c-check form-checkbox" />
                                                                                        <label for="edit-toggle-checkbox">
                                                                                            <span class="inc"></span>
                                                                                            <span class="check"></span>
                                                                                            <span class="box"></span>Register Now!
                                                                                        </label>
                                                                                    </div>  <label class="option" for="edit-toggle-checkbox">Register Now! </label>

                                                                                </div>
                                                                            </div>
                                                                            <div class = "c-form-register"><a href="/user/register">User Register Form</a></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="list-unstyled c-bs-grid-small-space">
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-sm-4 c-margin-t-10"><a href="/hybridauth/window/Facebook?destination=user&amp;destination_error=user" title="Facebook" class="hybridauth-widget-provider btn btn-block btn-social c-btn-square c-btn-uppercase btn-md btn-facebook hybridauth-onclick-current" rel="nofollow" data-hybridauth-provider="Facebook" data-hybridauth-url="/hybridauth/window/Facebook?destination=user&amp;destination_error=user" data-ajax="false" data-hybridauth-width="800" data-hybridauth-height="500"><i class = "fa fa-facebook"></i> Sign in with Facebook</a></div><div class="col-md-4 col-sm-4 c-margin-t-10"><a href="/hybridauth/window/Google?destination=user&amp;destination_error=user" title="Google" class="hybridauth-widget-provider btn btn-block btn-social c-btn-square c-btn-uppercase btn-md btn-google hybridauth-onclick-current" rel="nofollow" data-hybridauth-provider="Google" data-hybridauth-url="/hybridauth/window/Google?destination=user&amp;destination_error=user" data-ajax="false" data-hybridauth-width="800" data-hybridauth-height="500"><i class = "fa fa-google-plus"></i> Sign in with Google</a></div><div class="col-md-4 col-sm-4 c-margin-t-10"><a href="/hybridauth/window/Twitter?destination=user&amp;destination_error=user" title="Twitter" class="hybridauth-widget-provider btn btn-block btn-social c-btn-square c-btn-uppercase btn-md btn-twitter hybridauth-onclick-current" rel="nofollow" data-hybridauth-provider="Twitter" data-hybridauth-url="/hybridauth/window/Twitter?destination=user&amp;destination_error=user" data-ajax="false" data-hybridauth-width="800" data-hybridauth-height="500"><i class = "fa fa-twitter"></i> Sign in with Twitter</a></div>    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div></div></div></form>  </div>
                                        </div>
                                    </div>

                                </div>










                            </div>

                        </div>


                    </div>



                    <div  class="nd-region">



                        <div class = "container-fluid">

                            <div  id="Content-FullWidth" class="row">     
















                            </div>

                        </div>


                    </div>



                    <div  class="nd-region">



                        <div class = "container-fluid">

                            <div  id="Footer-FullWidth" class="row">     














                                <div  id="footer" class="col-md-12 ">

                                    <div class="region region-footer">
                                        <div id="block-block-45" class="block block-block">


                                            <div class="content">
                                                <div  class = 'c-layout-footer c-layout-footer-3 c-bg-dark ' id = 'footer'>
                                                    <div  class = 'c-prefooter ' id = 'contact'>
                                                        <div  class = 'container '>
                                                            <div  class = 'row '>
                                                                <div  class = 'col-md-3 '>
                                                                    <div  class = 'c-container c-first '>
                                                                        <div  class="c-content-title-1"><h3 class="c-left c-font-uppercase c-font-white c-font-bold  "><span class = "title-wrap">JAN <span class='c-theme-font'>GO</span></span></h3></div>
                                                                        <div class="c-content-title-1"><div class="c-line-left hide">&nbsp;</div><p class="c-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, s ed elit diam nonummy ad minim veniam quis nostrud exerci et tation diam.</p></div>
                                                                        <ul class = "c-links c-theme-ul"> <li> <a href="#">Home</a> </li> <li> <a href="#">About</a> </li> <li> <a href="#">Terms</a> </li> <li> <a href="#">Contact</a> </li></ul>
                                                                    </div>
                                                                </div>
                                                                <div  class = 'col-md-3 '>
                                                                    <div  class="c-content-title-1"><h3 class="c-left c-font-uppercase c-font-white c-font-bold  "><span class = "title-wrap">LATEST POSTS</span></h3></div>
                                                                    <div ><div class="view view-ng-blog-list view-id-ng_blog_list view-display-id-block_4 view-dom-id-d057652af257f9d6a6c676dc08fae669">



                                                                            <div class="view-content">
                                                                                <div class = "c-container mt-0 mb-0">
                                                                                    <div class = "c-blog">
                                                                                        <div class="c-post">
                                                                                            <div class="c-post-img">
                                                                                                <div class="field-content c-image"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/2_.jpg?itok=KM_RJID1" width="80" height="80" alt="Alt" /></div>  </div>
                                                                                            <div class="c-post-content">
                                                                                                <h4 class="c-post-title">
                                                                                                    <a href="/content/web-mobile-development">WEB &amp; MOBILE</a>    </h4>
                                                                                                <p class="c-text"><p>Lorem ipsum dolor sit amet, dolor adipisicing dolor sit amet elit atis unde o</p></p>
                                                                                            </div>
                                                                                        </div>          <div class="c-post">
                                                                                            <div class="c-post-img">
                                                                                                <div class="field-content c-image"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/9.jpg?itok=sudOm0WN" width="80" height="80" alt="Alt" /></div>  </div>
                                                                                            <div class="c-post-content">
                                                                                                <h4 class="c-post-title">
                                                                                                    <a href="/content/ux-design-conference-2015">UX DESIGN</a>    </h4>
                                                                                                <p class="c-text"><p>Lorem ipsum dolor sit amet, coectetuer diam ipsum dolor sit amet nonummy coec</p></p>
                                                                                            </div>
                                                                                        </div>      </div>
                                                                                </div>    </div>






                                                                        </div></div>
                                                                </div>
                                                                <div  class = 'col-md-3 '>
                                                                    <div  class="c-content-title-1"><h3 class="c-left c-font-uppercase c-font-white c-font-bold  "><span class = "title-wrap">LATEST WORKS</span></h3></div>
                                                                    <div ><div class="view view-project view-id-project view-display-id-block_1 view-dom-id-9ae36a5b7b6b24563b4e814940b572df">



                                                                            <div class="view-content">
                                                                                <div class = "c-works-small">
                                                                                    <ul class = "c-works">
                                                                                        <li class = "c-first">

                                                                                            <a href="http://jango.nikadevs.com/content/jango"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/14_0.jpg?itok=6iW_-sqT" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                        <li class = "">

                                                                                            <a href="http://jango.nikadevs.com/content/map"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/4.jpg?itok=T8qu0NfB" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                        <li class = "c-last">

                                                                                            <a href="http://jango.nikadevs.com/content/sign"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/6.jpg?itok=gSDcXUUE" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                    </ul>
                                                                                    <ul class = "c-works">
                                                                                        <li class = "c-first">

                                                                                            <a href="http://jango.nikadevs.com/content/do-dashboard-1"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/12.jpg?itok=4t56ODYU" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                        <li class = "">

                                                                                            <a href="http://jango.nikadevs.com/content/do-dashboard-0"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/8.jpg?itok=oLnJKrcu" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                        <li class = "c-last">

                                                                                            <a href="http://jango.nikadevs.com/content/dashboard-123"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/17.jpg?itok=KiLjR_oe" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                    </ul>
                                                                                    <ul class = "c-works">
                                                                                        <li class = "c-first">

                                                                                            <a href="http://jango.nikadevs.com/content/world-clock-widget"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/13.jpg?itok=UiUIKhfd" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                        <li class = "">

                                                                                            <a href="http://jango.nikadevs.com/content/do-dashboard"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/10.jpg?itok=b0MPJbhB" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                        <li class = "c-last">

                                                                                            <a href="http://jango.nikadevs.com/content/whereto-app"><img class="img-responsive img-responsive" src="http://jango.nikadevs.com/sites/jango.nikadevs.com/files/styles/project__80x80_/public/7.jpg?itok=_0gc99g_" width="80" height="80" alt="Alt" /></a>        </li>
                                                                                    </ul>
                                                                                </div>    </div>






                                                                        </div></div>
                                                                </div>
                                                                <div  class = 'col-md-3 '>
                                                                    <div  class = 'c-container c-last '>
                                                                        <div  class="c-content-title-1"><h3 class="c-left c-font-uppercase c-font-white c-font-bold  "><span class = "title-wrap">Find us</span></h3></div>
                                                                        <div class="c-content-title-1"> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed elit diam nonummy ad minim.</p></div>
                                                                        <ul class="c-socials"> <li> <a href="#"> <i class="icon-social-facebook"></i> </a> </li> <li> <a href="#"> <i class="icon-social-twitter"></i> </a> </li> <li> <a href="#"> <i class="icon-social-youtube"></i> </a> </li> <li> <a href="#"> <i class="icon-social-tumblr"></i> </a> </li></ul><ul class="c-address"> <li> <i class="icon-pointer c-theme-font"></i> One Boulevard, Beverly Hills</li> <li> <i class="icon-call-end c-theme-font"></i> +1800 1234 5678</li> <li> <i class="icon-envelope c-theme-font"></i> email@example.com</li></ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  class = 'c-postfooter '>
                                                        <div  class = 'container '>
                                                            <div  class = 'row '>
                                                                <div  class = 'col-sm-12 col-md-6 c-col '>
                                                                    <p class="c-copyright c-font-grey">2015 © JANGO <span class="c-font-grey-3">All Rights Reserved.</span></p>
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


                    </div>


                    <script src="//maps.googleapis.com/maps/api/js?key=" type="text/javascript"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/modules/jquery_update/replace/jquery/1.10/jquery.min.js?v=1.10.2"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/misc/jquery.once.js?v=1.2"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/misc/drupal.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/modules/jquery_update/replace/ui/external/jquery.cookie.js?v=67fb34f6a866c40d0570"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/modules/jquery_update/replace/jquery.form/3/jquery.form.min.js?v=3.51.0"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/misc/ajax.js?v=7.52"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/modules/jquery_update/js/jquery_update.js?v=0.0.1"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/modules/hybridauth/js/hybridauth.modal.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/modules/hybridauth/js/hybridauth.onclick.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/misc/progress.js?v=7.52"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/jquery-migrate.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/bootstrap/js/bootstrap.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/jquery.easing.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/reveal-animate/wow.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/base/js/scripts/reveal-animate/reveal-animate.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/owl-carousel/owl.carousel.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/counterup/jquery.waypoints.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/counterup/jquery.counterup.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/fancybox/jquery.fancybox.pack.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/zoom-master/jquery.zoom.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/isotope/isotope.pkgd.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/isotope/imagesloaded.pkgd.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/isotope/packery-mode.pkgd.min.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/ilightbox/js/jquery.requestAnimationFrame.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/ilightbox/js/jquery.mousewheel.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/ilightbox/js/ilightbox.packed.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/progress-bar/progressbar.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/base/js/scripts/pages/isotope-gallery.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/base/js/app.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/base/js/components.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/base/js/components-shop.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/gmaps/gmaps.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/assets/plugins/gmaps/api.js?oh0l2u"></script>
                    <script type="text/javascript" src="http://jango.nikadevs.com/sites/all/themes/jango/js/drupal.js?oh0l2u"></script>
                    <script type="text/javascript">
                        <!--//--><![CDATA[//><!--
                        jQuery.extend(Drupal.settings, {"basePath": "\/", "pathPrefix": "", "ajaxPageState": {"theme": "jango_sub", "theme_token": "Le4oOWvH0nIYpl-0cXTgD6vrlW2tMzvNGzZCPyvHotQ", "jquery_version": "1.10", "js": {"sites\/all\/modules\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js": 1, "misc\/jquery.once.js": 1, "misc\/drupal.js": 1, "sites\/all\/modules\/jquery_update\/replace\/ui\/external\/jquery.cookie.js": 1, "sites\/all\/modules\/jquery_update\/replace\/jquery.form\/3\/jquery.form.min.js": 1, "misc\/ajax.js": 1, "sites\/all\/modules\/jquery_update\/js\/jquery_update.js": 1, "sites\/all\/modules\/hybridauth\/js\/hybridauth.modal.js": 1, "sites\/all\/modules\/hybridauth\/js\/hybridauth.onclick.js": 1, "misc\/progress.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/jquery-migrate.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/bootstrap\/js\/bootstrap.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/jquery.easing.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/reveal-animate\/wow.js": 1, "sites\/all\/themes\/jango\/assets\/base\/js\/scripts\/reveal-animate\/reveal-animate.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/cubeportfolio\/js\/jquery.cubeportfolio.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/owl-carousel\/owl.carousel.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/counterup\/jquery.waypoints.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/counterup\/jquery.counterup.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/fancybox\/jquery.fancybox.pack.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/slider-for-bootstrap\/js\/bootstrap-slider.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/zoom-master\/jquery.zoom.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/isotope\/isotope.pkgd.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/isotope\/imagesloaded.pkgd.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/isotope\/packery-mode.pkgd.min.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/ilightbox\/js\/jquery.requestAnimationFrame.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/ilightbox\/js\/jquery.mousewheel.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/ilightbox\/js\/ilightbox.packed.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/progress-bar\/progressbar.js": 1, "sites\/all\/themes\/jango\/assets\/base\/js\/scripts\/pages\/isotope-gallery.js": 1, "sites\/all\/themes\/jango\/assets\/base\/js\/app.js": 1, "sites\/all\/themes\/jango\/assets\/base\/js\/components.js": 1, "sites\/all\/themes\/jango\/assets\/base\/js\/components-shop.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/gmaps\/gmaps.js": 1, "sites\/all\/themes\/jango\/assets\/plugins\/gmaps\/api.js": 1, "sites\/all\/themes\/jango\/js\/drupal.js": 1}, "css": {"modules\/system\/system.base.css": 1, "modules\/comment\/comment.css": 1, "modules\/field\/theme\/field.css": 1, "modules\/node\/node.css": 1, "sites\/all\/modules\/views\/css\/views.css": 1, "sites\/all\/modules\/ckeditor\/css\/ckeditor.css": 1, "sites\/all\/modules\/ctools\/css\/ctools.css": 1, "sites\/all\/modules\/hybridauth\/css\/hybridauth.css": 1, "sites\/all\/modules\/hybridauth\/css\/hybridauth.modal.css": 1, "sites\/all\/modules\/hybridauth\/plugins\/icon_pack\/hybridauth_32\/hybridauth_32.css": 1, "\/\/fonts.googleapis.com\/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700\u0026amp;subset=all": 1, "sites\/all\/themes\/jango\/assets\/plugins\/socicon\/socicon.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/bootstrap-social\/bootstrap-social.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/font-awesome\/css\/font-awesome.min.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/simple-line-icons\/simple-line-icons.min.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/animate\/animate.min.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/bootstrap\/css\/bootstrap.min.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/cubeportfolio\/css\/cubeportfolio.min.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/owl-carousel\/owl.carousel.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/owl-carousel\/owl.theme.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/owl-carousel\/owl.transitions.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/fancybox\/jquery.fancybox.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/slider-for-bootstrap\/css\/slider.css": 1, "sites\/all\/themes\/jango\/assets\/plugins\/ilightbox\/css\/ilightbox.css": 1, "sites\/all\/themes\/jango\/assets\/base\/css\/plugins.css": 1, "sites\/all\/themes\/jango\/assets\/base\/css\/components.css": 1, "sites\/all\/themes\/jango\/assets\/base\/css\/custom.css": 1, "sites\/all\/themes\/jango\/css\/drupal.css": 1, "sites\/all\/themes\/jango\/assets\/base\/css\/themes\/default.css": 1, "sites\/all\/themes\/jango\/jango_sub\/css\/custom.css": 1}}, "urlIsAjaxTrusted": {"\/user": true, "\/system\/ajax": true}, "ajax": {"edit-toggle-checkbox": {"callback": "jango_cms_ajax_user_register", "wrapper": "c-form-register", "event": "change", "url": "\/system\/ajax", "submit": {"_triggering_element_name": "toggle_checkbox"}}}, "theme_path": "sites\/all\/themes\/jango", "base_path": "\/"});
                        //--><!]]>
                    </script>

                    <div class="c-layout-go2top" style="display: block;">
                        <i class="icon-arrow-up"></i>
                    </div>

                    <nav class="c-layout-quick-sidebar">
                        <div class="c-header">
                            <button type="button" class="c-link c-close"><i class="icon-login"></i></button>
                        </div>
                        <div class="c-content">
                            <div class="c-section">
                                <h3>Theme Colors</h3>
                                <div class="c-settings">
                                    <span class="c-color c-default c-active" data-color="default"></span><span class="c-color c-green1" data-color="green1"></span><span class="c-color c-green2" data-color="green2"></span><span class="c-color c-green3" data-color="green3"></span><span class="c-color c-yellow1" data-color="yellow1"></span><span class="c-color c-yellow2" data-color="yellow2"></span><span class="c-color c-yellow3" data-color="yellow3"></span><span class="c-color c-red1" data-color="red1"></span><span class="c-color c-red2" data-color="red2"></span><span class="c-color c-red3" data-color="red3"></span><span class="c-color c-purple1" data-color="purple1"></span><span class="c-color c-purple2" data-color="purple2"></span><span class="c-color c-purple3" data-color="purple3"></span><span class="c-color c-blue1" data-color="blue1"></span><span class="c-color c-blue2" data-color="blue2"></span><span class="c-color c-blue3" data-color="blue3"></span><span class="c-color c-brown1" data-color="brown1"></span><span class="c-color c-brown2" data-color="brown2"></span><span class="c-color c-brown3" data-color="brown3"></span><span class="c-color c-dark1" data-color="dark1"></span><span class="c-color c-dark2" data-color="dark2"></span><span class="c-color c-dark3" data-color="dark3"></span>
                                </div>
                            </div>
                            <div class="c-section">
                                <h3>Header Type</h3>
                                <div class="c-settings">
                                    <input type="button" class="c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="boxed" value="boxed">
                                    <input type="button" class="c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="fluid" value="fluid"> </div>
                            </div>
                            <div class="c-section">
                                <h3>Header Mode</h3>
                                <div class="c-settings">
                                    <input type="button" class="c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="fixed" value="fixed">
                                    <input type="button" class="c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="static" value="static"> </div>
                            </div>
                            <div class="c-section">
                                <h3>Mega Menu Style</h3>
                                <div class="c-settings">
                                    <input type="button" class="c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="dark" value="dark">
                                    <input type="button" class="c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="light" value="light"> </div>
                            </div>
                            <div class="c-section">
                                <h3>Font Style</h3>
                                <div class="c-settings">
                                    <input type="button" class="c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active" data-value="default" value="default">
                                    <input type="button" class="c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase" data-value="light" value="light"> </div>
                            </div>
                        </div>
                    </nav>

                    <!--[if lt IE 9]>
                          <script src="../assets/global/plugins/excanvas.min.js"></script> 
                          <![endif]-->
                    </body>
                    </html>