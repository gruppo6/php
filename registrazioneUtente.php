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
        } else {
            echo "Utente già presente nel database";
        }
        Database::disconnect();
        header("Location: index.php");
    }
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="img/favicon.ico"> -->

        <title>Registrati</title>
    </head>

    <body>
        <div>
            <h2>Compila i campi</h2>
            <form action="registrazioneUtente.php" method="post" enctype="multipart/form-data">

                <div  <?php echo!empty($nomeError) ? 'error' : ''; ?>">
                    <label>Name</label>
                    <input name="nome" type="text"  placeholder="Nome" value="<?php echo!empty($nome) ? $nome : ''; ?>">
                    <?php if (!empty($nomeError)): ?>
                        <span><?php echo $nomeError; ?></span>
                    <?php endif; ?>
                </div>

                <div  <?php echo!empty($cognomeError) ? 'error' : ''; ?>">
                    <label>Cognome</label>

                    <input name="cognome" type="text"  placeholder="Cognome" value="<?php echo!empty($cognome) ? $cognome : ''; ?>">
                    <?php if (!empty($cognomeError)): ?>
                        <span><?php echo $cognomeError; ?></span>
                    <?php endif; ?>
                </div>

                <div  <?php echo!empty($usernameError) ? 'error' : ''; ?>">
                    <label>Nome Utente</label>
                    <input name="username" type="text"  placeholder="Nome Utente" value="<?php echo!empty($username) ? $username : ''; ?>">
                    <?php if (!empty($usernameError)): ?>
                        <span><?php echo $usernameError; ?></span>
                    <?php endif; ?>
                </div>

                <div  <?php echo!empty($passwordError) ? 'error' : ''; ?>">
                    <label>Password</label>

                    <input name="password" type="password"  placeholder="Password" value="<?php echo!empty($password) ? $password : ''; ?>">
                    <?php if (!empty($passwordError)): ?>
                        <span><?php echo $passwordError; ?></span>
                    <?php endif; ?>
                </div>                

                <div class="form-actions">
                    <button type="submit">REGISTRATI</button>
                    <a href="index.php">Torna Indietro</a>
                </div>
            </form>
        </div>
    </body>
</html>