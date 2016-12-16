<?php 
require_once 'session.php';

// se non sono collegato non può accedere e torna alla pagina di login
if(!isset($_SESSION['idUtente'])){
    header("Location: pagina-login.php");
}

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])){
    $_SESSION['activePage'] = basename($_SERVER['REQUEST_URI']);
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="it" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="it" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="it">
    <!--<![endif]-->
    <?php include 'backend-head.php' ?>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo"
          <?php if (!empty($_SESSION['messaggio'])): ?>onload="<?php echo $_SESSION['messaggio']; $_SESSION['messaggio'] = NULL; ?>"<?php endif; ?>
          >
        <?php include 'backend-header.php' ?>
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
                            <h1>Cruscotto Utente
                                <small>consultazione esami, iscrizioni, messaggistica</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Cruscotto Utente</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="<?php echo $esamiPrenotati; ?>">0</span>
                                            <small class="font-green-sharp"></small>
                                        </h3>
                                        <small>ESAMI PRENOTATI</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-pie-chart"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <a href="backend-esame.php?q=todo" class="btn green">Dettagli</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                            <span data-counter="counterup" data-value="<?php echo $esamiSostenuti; ?>">0</span>
                                        </h3>
                                        <small>ESAMI SOSTENUTI</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-like"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <a href="backend-esame.php?q=done" class="btn red">Dettagli</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span data-counter="counterup" data-value="<?php echo $esamiDaFare; ?>"></span>
                                        </h3>
                                        <small>ESAMI DA SOSTENERE</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress-info">
                                        <a href="backend-esame.php?q=todo" class="btn blue">Dettagli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span data-counter="counterup" data-value="<?php echo $messaggiNuovi; ?>"></span>
                                        </h3>
                                        <small>NUOVI MESSAGGI</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress-info">
                                        <a href="#" class="btn purple">Dettagli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <?php include 'backend-quick-sidebar.php' ?>
        </div>
        <!-- END CONTAINER -->
        <?php include 'backend-footer.php' ?>
    </body>
</html>