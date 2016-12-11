<?php 

require_once 'session.php';
require_once 'Esame.php'; 

// Validazione: verifico se è stato passato il tipo query "q" in GET...
if (!isset($_GET["q"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna query specificata')";
        header("Location: backend-esame.php?q=all");
}

// ...e se ha un valore corretto
$query = $_GET["q"];

if ($query != "todo" && $query != "done" && $query != "all") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
        header("Location: backend-esame.php?q=all");
}

switch ($query) {
    case "all":
        $listaEsami = Esame::selectAll();
        break;
    case "done":
        $listaEsami = Esame::selectFatti($_SESSION['idUtente']);
        break;
    case "todo":
        $listaEsami = Esame::selectDaFare($_SESSION['idUtente']);
        break;
    default:    // sostituisce la validazione con if()
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione imprevista.')";
        header("Location: backend-esame.php?q=all");
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
                            <h1>Elenco esami
                                <small>consultazione esami</small>
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
                            <span class="active">Elenco Esami</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="note note-info">
                        <p> In questa pagina è possibile visualizzare gli esami, cercarli e modificarli. </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Elenco Esami</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                        <div class="table">
                                            <table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline collapsed" width="100%" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="all sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 47px;" aria-sort="ascending" aria-label="Nome: activate to sort column descending">
                                                            Nome
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 39px;" aria-label="Cognome: activate to sort column ascending">
                                                            Descrizione
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 39px;" aria-label="Admin: activate to sort column ascending">
                                                            Data
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 34px;" aria-label="Azioni: activate to sort column ascending">
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    
                                                    foreach ($listaEsami as $esame) {
                                                        $id = $esame->getId(); // echo $some_var ? 'true': 'false';
                                                        echo "<tr role='row' class='" . (($id % 2 == 0) ? 'even' : 'odd') . "'>";
                                                        echo "<td tabindex='0' class='sorting_1'>" . $esame->getNome() . "</td>";
                                                        echo "<td>" . $esame->getDescrizione() . "</td>";
                                                        echo "<td>" . $esame->getData() . "</td>";
                                                        echo "<td>
                                                                <div class='btn-group pull-right'>
                                                                    <button class='btn green btn-xs btn-outline dropdown-toggle' data-toggle='dropdown'>Azioni
                                                                            <i class='fa fa-angle-down'></i>
                                                                    </button>
                                                                    <ul class='dropdown-menu pull-right'>
                                                                            <li>
                                                                                    <a href='backend-esame-form.php?action=update&id=$id'>
                                                                                            <i class='fa fa-info'></i> Visualizza </a>
                                                                            </li>
                                                                            <li>
                                                                                    <a href='backend-esame-action.php?action=delete&id=$id' onclick='return confirm(\'Sei sicuro?\');'>
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