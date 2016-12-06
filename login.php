<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, md5($_POST['password']));
    $check = "";
    $sql = "SELECT id FROM utenti WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $check = 'Bentornato!';
        header("location: controllo.php");
    } else {
        $check = '<p>Errore Password o Login errata</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="it_IT" dir="ltr">
    <?php include 'frontend-head.php';?>
    <body class="c-layout-header-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <?php include 'frontend-header.php';?>
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
                                            <div class="form-item form-type-textfield form-item-name">
                                                <div class = "form-group has-feedback">
                                                    <input placeholder="Username" type="text" class="form-control c-square c-theme input-lg required" id="edit-name" name="username" value="" size="60" maxlength="60" />
                                                    <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-password form-item-pass">
                                                <div class = "form-group has-feedback">
                                                    <input placeholder="Password" type="password" id="edit-pass" name="password" value="" size="60" maxlength="128" class="form-control c-square c-theme input-lg required" />
                                                    <span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span>
                                                </div>
                                            </div>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input class="btn-medium btn btn-mod form-submit btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white" type="submit" id="edit-submit" name="op" value="Log in" />
                                            </div>    
                                            <?php
                                            if (isset($check)) {
                                                echo $check;
                                            }
                                            ?> 
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
                                            <div class = "c-form-register"><a href="registrazioneUtente.php">Clicca qui.</a></div>
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
        <?php include 'frontend-footer.php';?>
    </body>
</html>












