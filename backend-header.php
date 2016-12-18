<?php
require_once 'session.php';
require_once 'connessione_db.php';
require_once 'Esame.php';
require_once 'Messaggistica.php';
require_once 'Utente.php';

$esamiPrenotati = count(Esame::selectPrenotati($_SESSION['idUtente']));
$esamiSostenuti = count(Esame::selectFatti($_SESSION['idUtente']));
$esamiDaFare = count(Esame::selectDaFare($_SESSION['idUtente']));
$messaggiNuovi = count(Messaggistica::selectNonLetti($_SESSION['idUtente']));
?>
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
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <!-- <form class="search-form" action="page_general_search_2.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form> -->
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
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
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                            <?php if ($esamiDaFare != 0): ?>
                                <span class="badge badge-primary"> <?php echo $esamiDaFare; ?> </span>
                            <?php endif; ?>
                        </a>
                        <?php if ($esamiDaFare != 0): ?>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>
                                        <span class="bold"><?php echo $esamiDaFare; ?> esami</span> in programma</h3>
                                    <a href="backend-esame.php?q=todo">Visualizza tutti</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <?php
                                        $listaEsami = Esame::selectDaFare($_SESSION['idUtente']);
                                        $i = 1;
                                        foreach ($listaEsami as $esame) {
                                            $id = $esame->getId();
                                            echo "<li>";
                                            echo "<a href='javascript:;'>";
                                            echo "<span class='from'>" . $esame->getNome() . "<br></span>";
                                            echo "<span class='message'>" . $esame->getDescrizione() . "</span>";
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
                    <!-- END TODO DROPDOWN -->
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