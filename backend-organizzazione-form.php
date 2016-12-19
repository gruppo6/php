<?php
require_once "session.php";
require_once "Helpers.php";
require_once "Organizzazione.php";

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])) {
    $_SESSION['activePage'] = basename($_SERVER['REQUEST_URI']);
}

// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend-organizzazione.php");
}

// ...e se ha un valore corretto
$action = $_GET["action"];
if ($action != "insert" && $action != "update" && $action != "delete") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend-organizzazione.php");
}

// Preparo i contenitori per i valori del form
$nome = "";
$descrizione = "";
$logo = "";

if ($action == "update" && empty($_POST)) {
    if (!isset($_GET["id"])) {
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
        header("Location: backend-organizzazione.php");
    }
    $id = $_GET["id"];
    $organizzazione = new Organizzazione($id);
    $esito = $organizzazione->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
        header("Location: backend-organizzazione.php");
    }
    $nome = $organizzazione->getNome();
    $descrizione = $organizzazione->getDescrizione();
    $logo = $organizzazione->getLogo();
}

if (!empty($_POST)) {
    // keep track validation errors
    $nomeError = null;
    $descrizioneError = null;
    $logoError = null;

    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $logo = $_FILES['logo']['name'];

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

    if (empty($logo)) {
        // qui devo prendermi quello che ho sul db per evitare problemi
        if (!empty($_POST['id'])) {
            $organizzazione = new Organizzazione($_POST['id']);
            $esito = $organizzazione->select();
            $_FILES['logo']['name'] = $organizzazione->getLogo();
        } else {
            $logoError = 'Per favore inserisci il logo';
            $valid = false;
        }
    } else {
        $validImg = validaImg();
        if ($validImg != "") {
            $logoError = $validImg;
            $valid = false;
        }
    }

    // insert data
    if ($valid) {
        $esito = true;  // Flag in cui memorizzare se la query è andata bene
        switch ($action) {
            case "insert":
                $esito = eseguiInsert();
                break;
            case "update":
                $esito = eseguiUpdate();
                break;
            default:    // sostituisce la validazione con if()
                $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
                header("Location: backend-organizzazione.php");
        }

        if ($esito === true) {
            $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', 'Organizzazione salvata correttamente.')";
            header("Location: backend-organizzazione.php");
        }
    }
}

function eseguiInsert() {
    extract($_POST);
    $organizzazione = new Organizzazione(0, $nome, $descrizione, $_FILES['logo']['name']);
    return $organizzazione->insert();
}

function eseguiUpdate() {
    extract($_POST);
    $organizzazione = new Organizzazione($id, $nome, $descrizione, $_FILES['logo']['name']);
    return $organizzazione->update();
}

function validaImg() {

    // Validazione del form
    if (empty($_POST)) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Non è stato inviato nessun form.')";
        header("Location: backend-organizzazione.php");
    } else {
        // validate input
        $logoError = "";
        // Validazione file
        if (empty($_FILES["logo"]["tmp_name"])) {
            $logoError = "Attenzione! Nessun file caricato.";
        } else {
            // Se la cartella per le immagini non esiste, la creo
            if (!file_exists("img"))
                mkdir("img");

            $target_file = "img/organizzazione/" . basename($_FILES["logo"]["name"]);
            switch (exif_imagetype($_FILES["logo"]["tmp_name"])) {
                case IMAGETYPE_GIF:
                    break;
                case IMAGETYPE_JPEG:
                    break;
                case IMAGETYPE_PNG:
                    break;
                default:
                    $logoError = "Errore! Il file non è in formato corretto.";
            }

            if ($logoError === "") {
                // Controllo la dimensione in pixel usando la libreria GD
                $misure = getimagesize($_FILES["logo"]["tmp_name"]);
                $larghezza = $misure[0];
                $altezza = $misure[1];
                if ($larghezza > 1000 || $altezza > 1000) {
                    $logoError = "L'immagine supera i 1000px di lato.";
                }

                if ($logoError == "") {   // Se non ci sono errori, copio il file
                    if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                        $logoError = "Errore in fase di caricamento del file.";
                    }
                }
            }
        }
    }
    return $logoError;
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
                                <small>gestione organizzazioni</small>
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
                            <span class="active">Organizzazione</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Nuova Organizzazione</span>
                                    </div>
                                    <div class="portlet-body form">
                                        <form method="post" action="backend-organizzazione-form.php?action=<?php echo "$action" ?>" enctype="multipart/form-data">
                                            <div class="form-body">
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group <?php echo!empty($nomeError) ? 'has-error' : ''; ?>">
                                                    <label for="nome">Nome</label>
                                                    <input type="text" 
                                                           name="nome"
                                                           minlenght="3"
                                                           maxlenght="100"
                                                           value="<?php echo!empty($nome) ? $nome : ''; ?>"
                                                           class="form-control" 
                                                           placeholder="Inserisci il nome..."> 
                                                    <?php if (!empty($nomeError)): ?><span class="help-block"><?php echo $nomeError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group <?php echo!empty($descrizioneError) ? 'has-error' : ''; ?>">
                                                    <label for="descrizione">Descrizione</label>
                                                    <textarea class="form-control" 
                                                              rows="3" 
                                                              minlength="10"
                                                              maxlength="255"
                                                              name="descrizione" 
                                                              placeholder="Inserisci la descrizione..."><?php echo!empty($descrizione) ? $descrizione : ''; ?></textarea>
                                                    <?php if (!empty($descrizioneError)): ?><span class="help-block"><?php echo $descrizioneError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group <?php echo!empty($logoError) ? 'has-error' : ''; ?>">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <?php
                                                            echo!empty($logo) ? "<img src='img/organizzazione/$logo' />" :
                                                                    "<img src='http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' alt=''>";
                                                            ?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"> 
                                                            <?php echo!empty($logo) ? "<img src='img/organizzazione/$logo' />" : ''; ?>
                                                        </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Seleziona immagine </span>
                                                                <span class="fileinput-exists"> Modifica </span>
                                                                <input type="hidden"><input 
                                                                    value="<?php echo!empty($logo) ? $logo : ''; ?>"
                                                                    type="file" 
                                                                    name="logo"></span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Rimuovi </a>
                                                        </div>
                                                    </div>
                                                    <?php if (!empty($logoError)): ?><span class="help-block"><?php echo $logoError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <input type="hidden" name="id" value="<?php echo!empty($id) ? $id : ''; ?>">
                                                <input name="submit" type="submit" value="Salva" class="btn blue" />
                                                <a href="backend-organizzazione.php" type="button" class="btn default">Cancella</a>
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