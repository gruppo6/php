<?php
require_once "Organizzazione.php";
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
$logo = "";
if ($action == "update") {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $organizzazione = new Organizzazione($id);
    $esito = $organizzazione->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        die("Errore in fase di lettura dal DB.");
    }
    $nome = $organizzazione->getNome();
    $logo = $organizzazione->getLogo();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Organizzazione</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Organizzazione</h1>
        <form method="post" action="organizzazione-action.php?action=<?php echo $action; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" class="file" name="logo" id="logo" value="<?php echo $logo; ?>" class="form-control">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Invia" class="btn btn-default">
        </form>

        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>