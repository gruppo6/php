<?php
require_once "session.php";
require_once "Helpers.php";
require_once "Certificazione.php";
require_once "Organizzazione.php";

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])) {
    $_SESSION['activePage'] = basename($_SERVER['REQUEST_URI']);
}

// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend-certificazione.php");
}

// ...e se ha un valore corretto
$action = $_GET["action"];
if ($action != "insert" && $action != "update" && $action != "delete") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend-certificazione.php");
}

// Preparo i contenitori per i valori del form
$id_organizzazione = "";
$nome = "";
$descrizione = "";
$logo = "";

if ($action == "update" && empty($_POST)) {
    if (!isset($_GET["id"])) {
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
        header("Location: backend-certificazione.php");
    }
    $id = $_GET["id"];
    $certificazione = new Certificazione($id);
    $esito = $certificazione->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
        header("Location: backend-certificazione.php");
    }
    $id_organizzazione = $certificazione->getId_organizzazione();
    $nome = $certificazione->getNome();
    $descrizione = $certificazione->getDescrizione();
    $logo = $certificazione->getLogo();
}

if (!empty($_POST)) {
    // keep track validation errors
    $id_organizzazioneError = null;
    $nomeError = null;
    $descrizioneError = null;
    $logoError = null;

    // keep track post values
    if (!empty($_POST['id_organizzazione'])) {
        $id_organizzazione = $_POST['id_organizzazione'];
    } else {
        $id_organizzazione = "";
    }

    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $logo = $_FILES['logo']['name'];

    // validate input
    $valid = true;

    if (empty($id_organizzazione)) {
        $id_organizzazioneError = 'Per favore seleziona la organizzazione';
        $valid = false;
    }

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
            $certificazione = new Certificazione($_POST['id']);
            $esito = $certificazione->select();
            $_FILES['logo']['name'] = $certificazione->getLogo();
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
                header("Location: backend-certificazione.php");
        }

        if ($esito === true) {
            $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', 'Certificazione salvata correttamente.')";
            header("Location: backend-certificazione.php");
        }
    }
}

function eseguiInsert() {
    extract($_POST);
    $certificazione = new Certificazione(0, $id_organizzazione, $nome, $descrizione, $_FILES['logo']['name']);
    return $certificazione->insert();
}

function eseguiUpdate() {
    extract($_POST);
    $certificazione = new Certificazione($id, $id_organizzazione, $nome, $descrizione, $_FILES['logo']['name']);
    return $certificazione->update();
}

function validaImg() {

    // Validazione del form
    if (empty($_POST)) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Non è stato inviato nessun form.')";
        header("Location: backend-certificazione.php");
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

            $target_file = "img/certificazione/" . basename($_FILES["logo"]["name"]);
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
                            <h1>Nuova Certificazione
                                <small>gestione certificazioni</small>
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
                            <span class="active">Certificazione</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Nuova Certificazione</span>
                                    </div>
                                    <div class="portlet-body form">
                                        <form method="post" action="backend-certificazione-form.php?action=<?php echo "$action" ?>" enctype="multipart/form-data">
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
                                                <div class="form-group <?php echo!empty($id_organizzazioneError) ? 'has-error' : ''; ?>">
                                                    <label>Organizzazione</label>
                                                    <select name="id_organizzazione" class="form-control">
                                                        <option value="" selected disabled>Seleziona Organizzazione</option>
                                                        <?php
                                                        $listaOrganizzazioni = Organizzazione::selectAll();
                                                        foreach ($listaOrganizzazioni as $organizzazione) {
                                                            $id = $organizzazione->getId();
                                                            $nomeOrganizzazione = $organizzazione->getNome();
                                                            if ($id_organizzazione === $id) {
                                                                $selezionato = "selected";
                                                            } else {
                                                                $selezionato = "";
                                                            }
                                                            echo "<option " . $selezionato . " value='$id'>$nomeOrganizzazione";
                                                            echo "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php if (!empty($id_organizzazioneError)): ?><span class="help-block"><?php echo $id_organizzazioneError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group <?php echo!empty($logoError) ? 'has-error' : ''; ?>">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <?php
                                                            echo!empty($logo) ? "<img src='img/certificazione/$logo' />" :
                                                                    "<img src='http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' alt=''>";
                                                            ?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"> 
                                                            <?php echo!empty($logo) ? "<img src='img/certificazione/$logo' />" : ''; ?>
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
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input name="submit" type="submit" value="Salva" class="btn blue" />
                                                <a href="backend-certificazione.php" type="button" class="btn default">Cancella</a>
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