<?php
require_once "Helpers.php";
require_once "Utente.php";

// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend-utente.php");
}

// ...e se ha un valore corretto
$action = $_GET["action"];

if ($action != "insert" && $action != "update" && $action != "delete") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend-utente.php");
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
                                        <img src="assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> 
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo (ucfirst($nome) . " " . ucfirst($cognome)); ?></div>
                                        <div class="profile-usertitle-job"> <?php echo (($amministratore) ? 'Amministratore' : 'Utente Semplice'); ?> </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="profile-userbuttons">
                                        <button type="button" class="btn btn-circle red btn-sm">Messaggia</button>
                                    </div>
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
                                                    <!--<li>
                                                        <a href="#tab_1_2" data-toggle="tab">Cambia Immagine</a>
                                                    </li>
                                                    <li>
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
                                                            <div class="form-group <?php if (!$amministratore): ?>hide<?php endif; ?> ">
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
                                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. </p>
                                                        <form action="#" role="form">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="..."> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">NOTE! </span>
                                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> Submit </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
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