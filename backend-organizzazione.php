<?php 
require_once 'session.php';
require_once 'Organizzazione.php';

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])){
    $_SESSION['activePage'] = basename($_SERVER['REQUEST_URI']);
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
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
                            <h1>Elenco Organizzazioni
                                <small>consultazione organizzazioni e modifica</small>
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
                            <span class="active">Elenco Organizzazioni</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="note note-info">
                        <p> In questa pagina è possibile visualizzare le organizzazioni, cercarle e modificarle. </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Elenco Organizzazioni</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                        <div class="table">
                                            <table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline collapsed" width="100%" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="all sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 47px;" aria-sort="ascending" aria-label="Logo: activate to sort column descending">
                                                            Logo
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 39px;" aria-label="Nome: activate to sort column ascending">
                                                            Nome
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 39px;" aria-label="Descrizione: activate to sort column ascending">
                                                            Descrizione
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 34px;" aria-label="Azioni: activate to sort column ascending">
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $listaOrganizzazioni = Organizzazione::selectAll();
                                                    foreach ($listaOrganizzazioni as $organizzazione) {
                                                        $id = $organizzazione->getId();
                                                        echo "<tr role='row' class='" . (($id % 2 == 0) ? 'even' : 'odd') . "'>";
                                                        echo "<td align='center' tabindex='0' class='sorting_1'><img style='height:50px;' src='img/organizzazione/" . 
                                                                $organizzazione->getLogo() . "' /></td>";
                                                        echo "<td>" . $organizzazione->getNome() . "</td>";
                                                        echo "<td>" . $organizzazione->getDescrizione() . "</td>";
                                                        echo "<td>
                                                                <div class='btn-group pull-right'>
                                                                    <button class='btn green btn-xs btn-outline dropdown-toggle' data-toggle='dropdown'>Azioni
                                                                            <i class='fa fa-angle-down'></i>
                                                                    </button>
                                                                    <ul class='dropdown-menu pull-right'>
                                                                            <li>
                                                                                    <a href='backend-organizzazione-form.php?action=update&id=$id'>
                                                                                            <i class='fa fa-info'></i> Visualizza </a>
                                                                            </li>
                                                                            <li>
                                                                                    <a href='backend-organizzazione-action.php?action=delete&id=$id' onclick='return confirm('Are you sure?');'>
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