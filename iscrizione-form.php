<?php
require_once "Istruzione.php";
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
$id_utente = "";
$id_esame = "";
$pagato = "";
$sostenuto = "";
$voto = "";
$voto_massimo = "";

if ($action == "update") {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $iscrizione = new Iscrizione($id);
    $esito = $iscrizione->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        die("Errore in fase di lettura dal DB.");
    }
    $id_utente = $iscrizione->getId_utente();
    $id_esame = $iscrizione->getId_esame();
    $pagato = $iscrizione->getPagato();
    $sostenuto = $iscrizione->getSostenuto();
    $voto = $iscrizione->getVoto();
    $voto_massimo = $iscrizione->getVoto_massimo();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Iscrizione</h1>
        <form method="post" action="istruzione-action.php?action=<?php echo $action; ?>"> 
            <div class="form-group">
                <label for="id_utente">Id_utente: </label>
                <input type="text" name="id_utente" id="id_utente" value="<?php echo $id_utente; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="id_esame">Id_esame:</label>
                <input type="text" name="id_esame" id="id_esame" value="<?php echo $id_esame; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="pagato">Pagato:</label>
                <input type="text" name="pagato" id="pagato" value="<?php echo $pagato; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="sostenuto">Sostenuto:</label>
                <input type="text" name="sostenuto" id="sostenuto" value="<?php echo $sostenuto; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="voto">Voto:</label>
                <input type="number" name="voto" id="voto" value="<?php echo $voto; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="voto_massimo">voto_massimo:</label>
                <input type="number" name="voto_massimo" id="voto_massimo" value="<?php echo $voto_massimo; ?>" class="form-control">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Invia" class="btn btn-default">
        </form>

        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>


