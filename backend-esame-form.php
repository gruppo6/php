<?php
require_once "Helpers.php";
require_once "Esame.php";

// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend-esame.php");
}

// ...e se ha un valore corretto
$action = $_GET["action"];

if ($action != "insert" && $action != "update" && $action != "delete") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend-esame.php");
}

if ($action == "update" && empty($_POST)) {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $esame = new Esame($id);
    $esito = $esame->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
        header("Location: backend-esame.php");
    }
    $id_certificazione = $esame->getId_certificazione();
    $nome = $esame->getNome();
    $descrizione = $esame->getDescrizione();
    $data = $esame->getData();
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="it">
    <!--<![endif]-->
    <?php include 'backend-head.php' ?>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo" >
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
                            <h1> <?php echo strtoupper($nome); ?>
                                <small>dettaglio esame</small>
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
                            <a href="backend-esame.php">Elenco Esami</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Esame</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-paper-plane font-yellow-casablanca"></i>
                                        <span class="caption-subject bold font-yellow-casablanca uppercase"> <?php echo $nome; ?> </span>
                                        <span class="caption-helper">dettagli esame...</span>
                                    </div>
                                    <div class="inputs hide">
                                        <div class="portlet-input input-inline input-medium">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-circle-left" placeholder="search...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-circle-right btn-default" type="submit">Go!</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <h4><?php echo $nome; ?></h4>
                                    <p><?php echo $descrizione; ?></p>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Elenco Iscrizioni</span>
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
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Elenco Risultati</span>
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