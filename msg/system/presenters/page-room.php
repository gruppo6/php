<?php
require_once 'session.php';
require_once 'connessione_db.php';
require_once 'Esame.php';
require_once 'Messaggistica.php';

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])) {
    $_SESSION['activePage'] = "backend-messaggistica.php";
}

$esamiPrenotati = count(Esame::selectPrenotati($_SESSION['idUtente']));
$esamiSostenuti = count(Esame::selectFatti($_SESSION['idUtente']));
$esamiDaFare = count(Esame::selectDaFare($_SESSION['idUtente']));
$messaggiNuovi = count(Messaggistica::selectNonLetti($_SESSION['idUtente']));
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Gianluca Tortorella" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <title>Brief | Pannello Admin</title>
        <link rel="shortcut icon" href="assets/base/img/favicon.png" /> 

        <!--[if lt IE 9]>
            <script src="./msg/js/html5shiv.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="./msg/css/room-page.css" />
        <script src="./msg/js/jquery.v2.0.2.min.js" type="text/javascript"></script>
        <script src="./msg/js/fn.extends.js" type="text/javascript"></script>
        <script src="./msg/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./msg/js/autosize.min.js" type="text/javascript"></script>
        <script src="./msg/js/niftyplayer.min.js" type="text/javascript"></script>
        <script src="./msg/js/system.page-room.js" type="text/javascript"></script>
        <script type="text/javascript">
            msg.lang = $.parseJSON('<?php echo str_replace("'", "\u0027", json_encode($lang)); ?>');
            msg.settings.data = $.parseJSON('<?php
unset($settings->profile_items_enc);
echo str_replace("'", "\u0027", json_encode($settings));
?>');
            msg.system.level = "<?php echo $user->amministratore; ?>";
            var filename = "<?php echo basename($_SERVER["SCRIPT_NAME"]); ?>";
        </script>
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.php">
                        <img src="assets/base/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                            <li><i class="icon-loading pull-right" id="page_loading_state" style="margin: 14px 10px 0 0; display: none;"></i></li>
                            <li class="separator hide"> </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-whatsapp"></i>
                                    <?php if ($messaggiNuovi != 0): ?>
                                        <span class="badge badge-danger"> <?php echo $messaggiNuovi; ?> </span>
                                    <?php endif; ?>
                                </a>
                                <?php if ($messaggiNuovi != 0): ?>
                                    <ul class="dropdown-menu">
                                        <li class="external">
                                            <h3>
                                                <span class="bold"><?php echo $messaggiNuovi; ?> nuovi</span> messaggi</h3>
                                            <a href="backend-messaggistica.php">Visualizza tutti</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                <?php
                                                $listaMessaggi = Messaggistica::selectNonLetti($_SESSION['idUtente']);
                                                $i = 1;
                                                foreach ($listaMessaggi as $messaggio) {
                                                    $id = $messaggio->getId();
                                                    $from = $messaggio->getFrom_id();
                                                    $utente = new Utente(0);
                                                    $utente->setId($from);
                                                    $utente->select();
                                                    if ($utente->getLogo() != NULL) {
                                                        $userAvatar = "<span class='photo'><img class='img-circle' src='img/utente/" . $utente->getLogo() . "' /> </span>";
                                                    } elseif ($utente->getLogo() == NULL) {
                                                        $userAvatar = "<span class='photo'><img class='img-circle' src='assets/pages/media/profile/profile_user.jpg' /> </span>";
                                                    }
                                                    echo "<li>";
                                                    echo "<a href='backend-messaggistica.php'>";
                                                    echo $userAvatar;
                                                    echo "<span class='subject'>";
                                                    echo "<span class='from'>" . $utente->getNome() . "</span>";
                                                    echo "<span class='time'>" . $messaggio->getTime() . "</span>";
                                                    echo "</span>";
                                                    echo "<span class='message'>" . $messaggio->getText() . "</span>";
                                                    echo "</a>";
                                                    echo "</li>";

                                                    if ($i++ == 3)
                                                        break;
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <li class="separator hide"> </li>

                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> <?php echo $login_session; ?> </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <?php
                                    echo!empty($_SESSION['logo']) ? "<img class='img-circle' src='img/utente/" . $_SESSION['logo'] . "' />" :
                                            "<img src='assets/pages/media/profile/profile_user.jpg' class='img-circle' alt''>";
                                    ?> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="backend-utente-form.php?action=update&id=<?php echo $_SESSION['idUtente']; ?>">
                                            <i class="icon-user"></i> Il Mio Profilo </a>
                                    </li>
                                    <!-- <li>
                                        <a href="app_todo_2.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li> -->
                                    <li class="divider"> </li>
                                    <!-- <li>
                                        <a href="page_user_lock_1.html">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li> -->
                                    <li>
                                        <a href="pagina-logout.php">
                                            <i class="icon-key"></i> Disconnetti </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <li class="dropdown dropdown-extended quick-sidebar-toggler hide">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php include 'backend-sidebar.php' ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Messaggistica
                                <small>contatta gli utenti del sito e chatta con loro!</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="backend.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Messaggistica</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <!-- BEGIN ROOMS -->
                        <div class="col-md-6">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-group"></i>
                                        <span class="caption-subject bold uppercase"><?php __("rooms"); ?></span>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-list" id="list-rooms"></ul>
                                </div>
                            </div>
                        </div>
                        <!-- END ROOMS -->

                        <!-- BEGIN ONLINE USERS -->
                        <div class="col-md-6">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-user"></i>
                                        <span class="caption-subject bold uppercase"><?php __("online_users"); ?></span>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="nav" id="list-online"></ul>
                                </div>
                            </div>
                        </div>
                        <!-- END ONLINE USERS -->

                        <!-- BEGIN ROOM CHAT -->
                        <div class="col-md-12">
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-whatsapp"></i>
                                        SCRIVI NELLA STANZA
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body"> 
                                    <div class="mainbar" style="display: none;">
                                        <div class="msg_textarea_wrapper">
                                            <textarea class="msg_textarea standard-input" id="msg_textarea" autocorrect="off" autocapitalize="off" placeholder="<?php __("response"); ?>"></textarea>
                                            <ul class="actions">
                                                <li>
                                                    <a class="btn btn-default" href="#" id="msg_send_button"><i class="fa fa-send"></i> <?php __("send"); ?></a>
                                                </li>
                                                <div style="clear: both;"></div>
                                            </ul>
                                        </div>
                                        <p></p>
                                        <div class="portlet box red">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-send"></i>Clicca a destra per gli ultimi Messaggi </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body" style="display: none;">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                                    <div class="scroller" style="height: 200px; overflow: hidden; width: auto;" data-initialized="1">
                                                        <ul class="msg_content_box" id="msg-content-box"></ul>
                                                        <div class="label label-warning msg_loading_older" id="msg_loading_older">
                                                            <i class="icon-loading"></i>&nbsp;&nbsp;&nbsp;
                                                            <?php __("loading_older"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 46.62px;">

                                                    </div>
                                                    <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROOM CHAT -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php if ($settings->enabled_pms): ?>
                <!-- Private messages
                    ================================================== -->
                <div class="pms_container navbar-fixed-bottom container">
                    <div class="pull-right" style="height: 29px;">  
                        <div class="btn-group dropup tab tab_grouper">
                            <button class="btn dropdown-toggle tab_button" tab-index="−1" data-toggle="dropdown"><i class="fa fa-folder-open"></i> <span>0</span></button>
                            <ul class="dropdown-menu" id="pms_tabs_grouper"></ul>
                        </div>
                        <div class="live_tabs_group" id="live_tabs_group"></div>
                        <div class="tab tab_typeahead" style="font-size: 14px;">
                            <input type="text" class="standard-input" placeholder="<?php __("start_chat_with"); ?>" autocomplete="off">
                        </div>    
                    </div>
                </div>
            <?php endif; ?>

            <!-- Hidden objects
                ================================================== -->  
            <div style="position: absolute; top: -9999px;">
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="0" height="0" id="niftyPlayer">
                    <param name=movie value="./msg/sounds/niftyplayer.swf?file=./sounds/message.mp3&as=0">
                    <embed src="./msg/sounds/niftyplayer.swf?file=./sounds/message.mp3&as=0" quality=high bgcolor=#FFFFFF width="0" height="0" name="niftyPlayer" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
                </object>

                <li data-user-id="{USER_ID}" id="pms_group_tab_prototype">
                    <a href="#" class="noselect">
                        <i class="fa fa-whatsapp login-state-icon" style="display: none;" title="<?php __("online"); ?>"></i> 
                        {USER_LOGIN} 
                        <i class="fa fa-remove btn-remove img-rounded"></i>
                    </a>
                </li>

                <div data-user-id="{USER_ID}" id="pms_tab_prototype" class="tab active portlet green">
                    <a class="caption-subject bold uppercase btn tab_button noselect" tab-index="−1">
                        <i class="fa fa-whatsapp login-state-icon" style="display: none;" title="<?php __("online"); ?>"></i> 
                        {USER_LOGIN}
                        <i class="fa fa-remove btn-remove img-rounded"></i>
                    </a>

                    <div class="pms_content_box">
                        <ul class="well well-small text_box"></ul>
                        <div class="pms_textarea_wrapper clearfix">
                            <textarea placeholder="Scrivi messaggio..." class="pms_textarea standard-input"></textarea>

                            <ul class="actions">
                                <li>
                                    <a href="#" class="pms_send_button">
                                        <i class="icon-ok"></i>
                                    </a>
                                </li>
                            </ul>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Others
                ================================================== -->    
            <!--[if lt IE 9]>
            <script src="assets/global/plugins/respond.min.js"></script>
            <script src="assets/global/plugins/excanvas.min.js"></script> 
            <script src="assets/global/plugins/ie8.fix.min.js"></script> 
            <![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <!-- <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
            <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
            <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
            <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>