<?php
require_once "Certificazione.php";
// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    die("Errore! Nessuna azione specificata.");
}

// ...e se ha un valore corretto
$action = $_GET["action"];
if ($action != "insert" && $action != "update") {
    die("Errore! Azione non prevista.");
}

// Preparo i contenitori per i valori del form
$id = "";
$nome = "";
$cognome = "";
$username = "";
$password = "";
$amministratore = "";

if ($action == "update") {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $utente = new Utente($id);
    $esito = $utente->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        die("Errore in fase di lettura dal DB.");
    }
    $nome = $utente->getNome();
    $cognome = $utente->getCognome();
    $username = $utente->getUsername();
    $password = $utente->getPassword();
    $amministratore = $utente->getAmministratore();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Utente</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Utente</h1>
        <form method="post" action="utente-action.php?action=<?php echo $action; ?>">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="cognome">Cognome</label>
                <input type="text" class="file" name="cognome" id="cognome" value="<?php echo $cognome; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" value="<?php echo $password; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="amministratore">Amministratore:</label>
                <input type="text" name="amministratore" id="amministratore" value="<?php echo $amministratore; ?>" class="form-control">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Invia" class="btn btn-default">
        </form>

        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
