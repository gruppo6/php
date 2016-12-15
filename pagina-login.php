<?php
require_once "Helpers.php";
require_once "Utente.php";
session_start();

if (!empty($_POST)) {
    $check = "";
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $utente = new Utente(0);
    $esito = $utente->login($myusername, $mypassword);
    if ($esito == true) {
        $_SESSION['login_user'] = $myusername; //salvo in sessione la username
        
        $login_session = $utente->getUsername();
        $_SESSION['amministratore'] = $utente->getAmministratore();
        $_SESSION['logo'] = $utente->getLogo();
        $_SESSION['idUtente'] = $utente->getId();
        $_SESSION['username'] = $utente->getUsername();
        header("location: index.php");
    } else {
        $check = 'Errore! Password o Login errata...';
    }
}
?>
<!DOCTYPE html>
<html lang="it_IT" dir="ltr">
    <?php include 'index-head.php'; ?>
    <body class="c-layout-header-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <?php include 'index-header.php'; ?>
        <!-- END: LAYOUT/HEADERS/HEADER-1 -->        
        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <div class="c-content-box c-size-md c-bg-grey">
                <div class="container">
                    <form action = "" method = "post" class="form-signin">
                        <div class="c-shop-login-register-1">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Accedi</h3>
                                <div class="c-line-left">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default c-panel">
                                        <div class="panel-body c-panel-body">
                                            <?php if (!empty($check)): ?>
                                                <div class="alert alert-danger" role="alert"><?php echo $check; ?></div>
                                            <?php endif; ?>
                                            <div class="form-item form-type-textfield form-item-name">
                                                <div class = "form-group has-feedback <?php echo!empty($check) ? 'has-error' : ''; ?>">
                                                    <input placeholder="Username" type="text" class="form-control c-square c-theme input-lg required" id="edit-name" name="username" value="" size="60" maxlength="60" />
                                                    <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-password form-item-pass">
                                                <div class = "form-group has-feedback <?php echo!empty($check) ? 'has-error' : ''; ?>">
                                                    <input placeholder="Password" type="password" id="edit-pass" name="password" value="" size="60" maxlength="128" class="form-control c-square c-theme input-lg required" />
                                                    <span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span> 
                                                </div>
                                            </div>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input class="btn-medium btn btn-mod form-submit btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white" type="submit" name="submit" value="Accedi" />
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default c-panel">
                                        <div class="panel-body c-panel-body">
                                            <div class="c-content-title-1">
                                                <h3 class="c-left">
                                                    <i class="icon-user"></i>Non hai un account?</h3>
                                                <div class="c-line-left c-theme-bg"></div>
                                                <p>Iscriviti a infobasic.</p>
                                            </div>
                                            <div class = "c-form-register"><a href="pagina-registrazione-utente.php">Clicca qui.</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: PAGE CONTAINER -->
        <?php include 'index-footer.php'; ?>
    </body>
</html>