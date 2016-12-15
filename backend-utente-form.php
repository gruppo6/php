<?php
require_once "session.php";
require_once "Helpers.php";
require_once "Utente.php";

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])) {
    $_SESSION['activePage'] = basename($_SERVER['REQUEST_URI']);
}

// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend-utente.php");
}

// ...e se ha un valore corretto
$action = $_GET["action"];

if ($action != "insert" && $action != "update" && $action != "delete" && $action != "updateimg") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend-utente.php");
}

// se non sono amministratore, posso solo vedere il mio profilo
if (($_SESSION['amministratore'] == 0) && ($_GET["id"] != $_SESSION['idUtente']) && ($action != "updateimg")) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend.php");
}

if ($action == "update" && empty($_POST)) {
    if (!isset($_GET["id"])) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Non è stato specificato l'id dell'utente da modificare.')";
        header("Location: backend-utente.php");
    }
    $id = $_GET["id"];
    $utente = new Utente($id);
    $esito = $utente->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
        header("Location: backend-utente.php");
    }
    $nome = $utente->getNome();
    $cognome = $utente->getCognome();
    $username = $utente->getUsername();
    $password = $utente->getPassword();
    $amministratore = $utente->getAmministratore();
    $logo = $utente->getLogo();
}

if ($action == "updateimg" && !empty($_POST)) {
    $logoError = eseguiUpdateImg();
    if ($logoError == "") {
        $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', 'Immagine aggiornata con successo.')";
        header("Location: backend.php");
    } else {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', '$logoError')";
        header("Location: backend.php");
    }
}

function eseguiUpdateImg() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $validImg = validaImg();
        if ($validImg == "") {
            $utente = new Utente($_POST['id']);
            $utente->setLogo($_FILES["logo"]["name"]);
            $utente->updateImg();
            return "";
        } else {
            return $validImg;
        }
    } else {
        return "";
    }
}

function validaImg() {
    // Validazione del form
    if (empty($_POST)) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Non è stato inviato nessun form.')";
        header("Location: backend-utente.php");
    } else {
        // validate input
        $logoError = "";
        // Validazione file
        if (empty($_FILES["logo"]["tmp_name"])) {
            $logoError = "Immagine non modificata.";
        } else {
            // Se la cartella per le immagini non esiste, la creo
            if (!file_exists("img")) {
                mkdir("img");
            }

            $target_file = "img/utente/" . basename($_FILES["logo"]["name"]);
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
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1> <?php echo strtoupper($nome . " " . $cognome); ?>
                                <small>dettaglio utente</small>
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
                            <a href="backend-utente.php">Elenco Utenti</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Utente</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet bordered">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <?php
                                        echo!empty($logo) ? "<img class='img-responsive' src='img/utente/$logo' />" :
                                                "<img src='assets/pages/media/profile/profile_user.jpg' class='img-responsive' alt''>";
                                        ?>
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo (ucfirst($nome) . " " . ucfirst($cognome)); ?></div>
                                        <div class="profile-usertitle-job"> <?php echo (($amministratore) ? 'Amministratore' : 'Utente Semplice'); ?> </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <!-- <div class="profile-userbuttons">
                                        <button type="button" class="btn btn-circle red btn-sm">Messaggia</button>
                                    </div> -->
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profilo</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Informazioni Personali</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Cambia Immagine</a>
                                                    </li>
                                                    <!--<li>
                                                        <a href="#tab_1_3" data-toggle="tab">Cambia Password</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form method="post" action="backend-utente-action.php?action=<?php echo $action; ?>">
                                                            <div class="form-group <?php echo!empty($nomeError) ? 'has-error' : ''; ?>">
                                                                <label class="control-label" 
                                                                       for="nome">Nome
                                                                </label>
                                                                <input type="text" 
                                                                       placeholder="<?php echo!empty($nome) ? $nome : 'Inserisci Nome...'; ?>" 
                                                                       name="nome" 
                                                                       value="<?php echo!empty($nome) ? $nome : ''; ?>" 
                                                                       class="form-control" required /> 
                                                                <?php if (!empty($nomeError)): ?><span class="help-block"><?php echo $nomeError; ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group <?php echo!empty($cognomeError) ? 'has-error' : ''; ?>">
                                                                <label class="control-label" 
                                                                       for="cognome">Cognome
                                                                </label>
                                                                <input type="text" 
                                                                       placeholder="<?php echo!empty($cognome) ? $cognome : 'Inserisci Cognome...'; ?>" 
                                                                       name="cognome" 
                                                                       value="<?php echo!empty($cognome) ? $cognome : ''; ?>" 
                                                                       class="form-control" required /> 
                                                                <?php if (!empty($cognomeError)): ?><span class="help-block"><?php echo $cognomeError; ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group <?php echo!empty($usernameError) ? 'has-error' : ''; ?>">
                                                                <label class="control-label" 
                                                                       for="username">Nome Utente
                                                                </label>
                                                                <input type="text" 
                                                                       placeholder="<?php echo!empty($username) ? $username : 'Inserisci Nome utente...'; ?>" 
                                                                       name="username" 
                                                                       value="<?php echo!empty($username) ? $username : ''; ?>" 
                                                                       class="form-control" required /> 
                                                                <?php if (!empty($usernameError)): ?><span class="help-block"><?php echo $usernameError; ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group <?php echo!empty($passwordError) ? 'has-error' : ''; ?>">
                                                                <label class="control-label" 
                                                                       for="password">Password
                                                                </label>
                                                                <input type="password" 
                                                                       placeholder="<?php echo!empty($password) ? $password : 'Inserisci Password...'; ?>" 
                                                                       name="password" 
                                                                       value="<?php echo!empty($password) ? $password : ''; ?>" 
                                                                       class="form-control" required /> 
                                                                <?php if (!empty($passwordError)): ?><span class="help-block"><?php echo $passwordError; ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group <?php if ($_SESSION['amministratore'] == 0): ?>hide<?php endif; ?> ">
                                                                <label for="amministratore">Seleziona tipologia utente:</label>
                                                                <select class="form-control" name="amministratore">
                                                                    <option <?php if ($amministratore): ?>selected<?php endif; ?> value="1">Amministratore</option>
                                                                    <option <?php if (!$amministratore): ?>selected<?php endif; ?> value="0">Utente Semplice</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                            <input type="hidden" name="action" value="<?php echo $action; ?>">
                                                            <div class="margiv-top-10">
                                                                <input name="submit" type="submit" value="Salva" class="btn green" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <p> Se vuoi personalizzare il tuo avatar, aggiorna l'immagine del tuo profilo! </p>
                                                        <form method="post" action="backend-utente-form.php?action=updateimg" enctype="multipart/form-data">
                                                            <div class="form-group <?php echo!empty($logoError) ? 'has-error' : ''; ?>">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <?php
                                                                        echo!empty($logo) ? "<img src='img/utente/$logo' />" :
                                                                                "<img src='assets/pages/media/profile/profile_user.jpg' class='img-responsive' alt''>";
                                                                        ?>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"> 
                                                                        <?php echo!empty($logo) ? "<img src='img/utente/$logo' />" : ''; ?>
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
                                                            <div class="form-actions">
                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                <input name="submit" type="submit" value="Aggiorna" class="btn blue" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label>
                                                                <input type="password" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <input type="password" class="form-control" /> </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> Change Password </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
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