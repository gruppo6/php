<!DOCTYPE html>
<?php
include('session.php');
require 'connessione_db.php';

if (!empty($_POST)) {
    // variabili che gestiscono gli errori del form
    $nomeError = null;
    $cognomeError = null;
    $usernameError = null;
    $passwordError = null;

    // variabili dove salviamo il valore del form
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // controlli sui campi
    $valid = true;
    if (empty($nome)) {
        $nomeError = 'Per favore inserisci il nome';
        $valid = false;
    }

    if (empty($cognome)) {
        $cognomeError = 'Per favore inserisci il cognome';
        $valid = false;
    }

    if (empty($username)) {
        $usernameError = 'Per favore inserisci il nome utente';
        $valid = false;
    }

    if (empty($password)) {
        $passwordError = 'Per favore inserisci la password';
        $valid = false;
    }

    // salviamo sul database
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Apro la connessione al db
        $link = mysqli_connect("localhost", "root", "", "corsi");
        mysqli_set_charset($link, "utf8");
        // Preparo la query
        $sql = "SELECT * FROM utenti WHERE username = '$username'";

        // Eseguo la query
        $result = mysqli_query($link, $sql);
        // Chiudo la connessione al db
        mysqli_close($link);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows==0) {
            $sql = "INSERT INTO utenti (nome,cognome,username,"
                    . "password, amministratore"
                    . ") values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $cognome, $username, md5($password), 0));   
            header("Location: index.php");
        } else {
            $usernameError = "Utente già presente nel database";
        }
        Database::disconnect();   
    }
}
?>
<!DOCTYPE html>
<html lang="it_IT" dir="ltr">
    <?php include 'index-head.php';?>
    <body class="c-layout-header-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <?php include 'index-header.php';?>
        <!-- END: LAYOUT/HEADERS/HEADER-1 -->        
        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <div class="c-content-box c-size-md c-bg-grey">
                <div class="container">
                    <form action="pagina-registrazione-utente.php" method="post" enctype="multipart/form-data">
                        <div class="c-shop-login-register-1">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Registrati</h3>
                                <div class="c-line-left">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default c-panel">
                                        <div class="panel-body c-panel-body">
                                            <div class="form-group <?php echo!empty($nomeError) ? 'has-error' : ''; ?>">
                                                <label>Nome</label>
                                                <input class="form-control c-square c-theme input-lg required" name="nome" type="text"  placeholder="Nome" value="<?php echo!empty($nome) ? $nome : ''; ?>">
                                                <?php if (!empty($nomeError)): ?>
                                                    <span class="help-block"><?php echo $nomeError; ?></span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php echo!empty($cognomeError) ? 'has-error' : ''; ?>">
                                                <label>Cognome</label>
                                                <input class="form-control c-square c-theme input-lg required" name="cognome" type="text"  placeholder="Cognome" value="<?php echo!empty($cognome) ? $cognome : ''; ?>">
                                                <?php if (!empty($cognomeError)): ?>
                                                    <span class="help-block"><?php echo $cognomeError; ?></span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php echo!empty($usernameError) ? 'has-error' : ''; ?>">
                                                <label>Nome Utente</label>
                                                <input class="form-control c-square c-theme input-lg required" name="username" type="text"  placeholder="Nome Utente" value="<?php echo!empty($username) ? $username : ''; ?>">
                                                <?php if (!empty($usernameError)): ?>
                                                    <span class="help-block"><?php echo $usernameError; ?></span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php echo!empty($passwordError) ? 'has-error' : ''; ?>">
                                                <label>Password</label>
                                                <input class="form-control c-square c-theme input-lg required" name="password" type="password"  placeholder="Password" value="<?php echo!empty($password) ? $password : ''; ?>">
                                                <?php if (!empty($passwordError)): ?>
                                                    <span class="help-block"><?php echo $passwordError; ?></span>
                                                <?php endif; ?>
                                            </div>                

                                            <div class="form-actions form-wrapper">
                                                <button class="btn-medium btn btn-mod form-submit btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white" type="submit">REGISTRATI</button>
                                            </div>
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
        <?php include 'index-footer.php';?>
    </body>
</html>