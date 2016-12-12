<!DOCTYPE html>
<?php
require_once "session.php";
require_once "Helpers.php";
require_once "Certificazione.php";

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
                            <h1>Nuovo Esame
                                <small>creazione nuovo esame</small>
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
                            <span class="active">Nuovo Esame</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Default Form</span>
                                    </div>
                                    <div class="portlet-body form">
                                        <form role="form">
                                            <div class="form-body">
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Seleziona immagine </span>
                                                                <span class="fileinput-exists"> Modifica </span>
                                                                <input type="hidden"><input type="file" name="..."> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Rimuovi </a>
                                                        </div>
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