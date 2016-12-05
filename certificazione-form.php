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
$id_organizzazione = "";
$nome = "";
$logo = "";
if ($action == "update") {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $certificazione = new Certificazione($id);
    $esito = $certificazione->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        die("Errore in fase di lettura dal DB.");
    }
    $id_organizzazione = $certificazione->getId_organizzazione();
    $nome = $certificazione->getNome();
    $logo = $certificazione->getLogo();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Certificazione</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Certificazione</h1>
        <form method="post" action="certificazione-action.php?action=<?php echo $action; ?>">
            <div class="form-group">
                <label for="id_organizzazione">Organizzazione: </label>
                <input type="text" name="id_organizzazione" id="id_organizzazione" value="<?php echo $id_organizzazione; ?>" class="form-control">
            </div>
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
