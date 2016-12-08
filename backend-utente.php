<!DOCTYPE html>
<?php
include('session.php');
include 'connessione_db.php';
require_once "Helpers.php";
require_once "Utente.php";
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="it">
    <!--<![endif]-->
    <?php include 'backend-head.php' ?>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
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
                            <h1>Elenco utenti
                                <small>consultazione utenti e modifica</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar hide">
                            <div id="dashboard-report-range" data-display-range="0" class="pull-right tooltips btn btn-fit-height green" data-placement="left" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-settings"></i>
                                </a>
                                <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <h3>HEADER</h3>
                                            <ul class="theme-colors">
                                                <li class="theme-color theme-color-default active" data-theme="default">
                                                    <span class="theme-color-view"></span>
                                                    <span class="theme-color-name">Dark Header</span>
                                                </li>
                                                <li class="theme-color theme-color-light " data-theme="light">
                                                    <span class="theme-color-view"></span>
                                                    <span class="theme-color-name">Light Header</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                                            <h3>LAYOUT</h3>
                                            <ul class="theme-settings">
                                                <li> Theme Style
                                                    <select class="layout-style-option form-control input-small input-sm">
                                                        <option value="square">Square corners</option>
                                                        <option value="rounded" selected="selected">Rounded corners</option>
                                                    </select>
                                                </li>
                                                <li> Layout
                                                    <select class="layout-option form-control input-small input-sm">
                                                        <option value="fluid" selected="selected">Fluid</option>
                                                        <option value="boxed">Boxed</option>
                                                    </select>
                                                </li>
                                                <li> Header
                                                    <select class="page-header-option form-control input-small input-sm">
                                                        <option value="fixed" selected="selected">Fixed</option>
                                                        <option value="default">Default</option>
                                                    </select>
                                                </li>
                                                <li> Top Dropdowns
                                                    <select class="page-header-top-dropdown-style-option form-control input-small input-sm">
                                                        <option value="light">Light</option>
                                                        <option value="dark" selected="selected">Dark</option>
                                                    </select>
                                                </li>
                                                <li> Sidebar Mode
                                                    <select class="sidebar-option form-control input-small input-sm">
                                                        <option value="fixed">Fixed</option>
                                                        <option value="default" selected="selected">Default</option>
                                                    </select>
                                                </li>
                                                <li> Sidebar Menu
                                                    <select class="sidebar-menu-option form-control input-small input-sm">
                                                        <option value="accordion" selected="selected">Accordion</option>
                                                        <option value="hover">Hover</option>
                                                    </select>
                                                </li>
                                                <li> Sidebar Position
                                                    <select class="sidebar-pos-option form-control input-small input-sm">
                                                        <option value="left" selected="selected">Left</option>
                                                        <option value="right">Right</option>
                                                    </select>
                                                </li>
                                                <li> Footer
                                                    <select class="page-footer-option form-control input-small input-sm">
                                                        <option value="fixed">Fixed</option>
                                                        <option value="default" selected="selected">Default</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END THEME PANEL -->
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Elenco Utenti</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="note note-info">
                        <p> In questa pagina è possibile visualizzare gli utenti, cercarli e modificarli. </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Elenco Utenti</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                        <div class="table">
                                            <table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline collapsed" width="100%" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="all sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 47px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                            Nome
                                                        </th>
                                                        <th class="min-phone-l sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 39px;" aria-label="Last name: activate to sort column ascending">
                                                            Cognome
                                                        </th>
                                                        <th class="all sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 34px;" aria-label="Extn.: activate to sort column ascending">
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $listaUtenti = Utente::selectAll();
                                                    foreach ($listaUtenti as $utente) {
                                                        $id = $utente->getId(); // echo $some_var ? 'true': 'false';
                                                        echo "<tr role='row' class='". (($id % 2  == 0) ? 'even': 'odd') ."'>";
                                                        echo "<td tabindex='0' class='sorting_1'>" . $utente->getNome() . "</td>";
                                                        echo "<td>" . $utente->getCognome() . "</td>";
                                                        echo "<td>
                                                                <div class='btn-group pull-right'>
                                                                    <button class='btn green btn-xs btn-outline dropdown-toggle' data-toggle='dropdown'>Azioni
                                                                            <i class='fa fa-angle-down'></i>
                                                                    </button>
                                                                    <ul class='dropdown-menu pull-right'>
                                                                            <li>
                                                                                    <a href='backend-utente-form.php?action=update&id=$id'>
                                                                                            <i class='fa fa-info'></i> Visualizza </a>
                                                                            </li>
                                                                            <li>
                                                                                    <a href='backend-utente-form.php?action=update&id=$id'>
                                                                                            <i class='fa fa-edit'></i> Modifica </a>
                                                                            </li>
                                                                            <li>
                                                                                    <a href='backend-utente-form.php?action=delete&id=$id' onclick='return confirm(\'Sei sicuro?\');'>
                                                                                            <i class='fa fa-trash'></i> Elimina </a>
                                                                            </li>
                                                                    </ul>
                                                                
                                                            </div></td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
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