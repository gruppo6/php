<!DOCTYPE html>
<?php
require_once "session.php";
require_once "Helpers.php";
require_once "Organizzazione.php";

if (!empty($_POST)) {
    // keep track validation errors
    $nomeError = null;
    $descrizioneError = null;
    $distributoreError = null;
    $genereError = null;
    $pegiError = null;
    $prezzoError = null;
    $piattaformaError = null;
    $statoError = null;
    $barcodeError = null;
    $giacenzaError = null;

    // keep track post values
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $distributore = $_POST['distributore'];
    $genere = $_POST['genere'];
    $pegi = $_POST['pegi'];
    $prezzo = $_POST['prezzo'];
    $piattaforma = $_POST['piattaforma'];
    $stato = $_POST['stato'];
    $barcode = $_POST['barcode'];
    $giacenza = $_POST['giacenza'];

    // validate input
    $valid = true;
    if (empty($nome)) {
        $nomeError = 'Per favore inserisci il nome';
        $valid = false;
    }

    if (empty($descrizione)) {
        $descrizioneError = 'Per favore inserisci la descrizione';
        $valid = false;
    }

    if (empty($distributore)) {
        $distributoreError = 'Per favore inserisci il distributore';
        $valid = false;
    }

    if (empty($genere)) {
        $genereError = 'Per favore inserisci il genere';
        $valid = false;
    }

    if (empty($pegi)) {
        $pegiError = 'Per favore inserisci il pegi';
        $valid = false;
    }

    if (empty($prezzo)) {
        $prezzoError = 'Per favore inserisci il prezzo';
        $valid = false;
    }

    if (empty($piattaforma)) {
        $piattaformaError = 'Per favore inserisci la piattaforma';
        $valid = false;
    }

    if (empty($stato)) {
        $statoError = 'Per favore inserisci lo stato';
        $valid = false;
    }

    if (empty($barcode)) {
        $barcodeError = 'Per favore inserisci il barcode';
        $valid = false;
    }

    if (empty($giacenza)) {
        $giacenzaError = 'Per favore inserisci la giacenza';
        $valid = false;
    }

    if (count($_FILES) == 0) {
        echo "<p>Attenzione! Nessun file selezionato</p>";
        $fileError = true;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO videogiochi (nome,descrizione,distributore,"
                . "genere,pegi,prezzo,piattaforma,stato,barcode,giacenza"
                . ") values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $descrizione, $distributore, $genere, $pegi,
            $prezzo, $piattaforma, $stato, $barcode, $giacenza));
        Database::disconnect();
        header("Location: controllo.php");
    }
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
                <div class="page-content" style="min-height: 1603px;">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Nuova Organizzazione
                                <small>creazione nuova organizzazione</small>
                            </h1>
                        </div>
                    </div>
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="backend.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Nuova Organizzazione</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Nuova Organizzazione</span>
                                    </div>
                                    <div class="portlet-body form">
                                        <form role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="text" class="form-control" placeholder="Email Address"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <a type="submit" class="btn blue">Salva</a>
                                                <a href="backend.php" type="button" class="btn default">Cancella</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
            <?php include 'backend-quick-sidebar.php' ?>
        </div>
        <!-- END CONTAINER -->
        <?php include 'backend-footer.php' ?>
    </body>
</html>