<?php
require_once "Esame.php";
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
$id_certificazione= "";
$data = "";
if ($action == "update") {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $esame = new Esame($id);
    $esito = $esame->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        die("Errore in fase di lettura dal DB.");
    }
    $id_certificazione = $utente->getId_certificazione();
    $data = $utente->getData();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Esame</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Esame</h1>
        <form method="post" action="esame-action.php?action=<?php echo $action; ?>">
            <div class="form-group">
                <label for="id_certificazione">Certificazione: </label>
                <input type="text" name="id_certificazione" id="id_certificazione" value="<?php echo $id_certificazione; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" value="<?php echo $data; ?>" class="form-control">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Invia" class="btn btn-default">
        </form>

        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
