<?php
require_once "Helpers.php";
require_once "Iscrizione.php";

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])){
    $_SESSION['activePage'] = basename($_SERVER['REQUEST_URI']);
}

// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend-esame.php");
}

// ...e se ha un valore corretto
$action = $_GET["action"];
if ($action != "insert" && $action != "update") {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
    header("Location: backend-esame.php");
}

// Preparo i contenitori per i valori del form
//$id = "";
$id_utente = "";
$id_esame = "";
$pagato = "";
$sostenuto = "";
$voto = "";
$voto_massimo = "";

if ($action == "update") {
    if (!isset($_GET["id"])) {
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
        header("Location: backend-esame.php");
    }
    $id = $_GET["id"];
    $iscrizione = new Iscrizione($id);
    $esito = $iscrizione->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
        header("Location: backend-esame.php");
    }
    $id_utente = $iscrizione->getId_utente();
    $id_esame = $iscrizione->getId_esame();
    $pagato = $iscrizione->getPagato();
    $sostenuto = $iscrizione->getSostenuto();
    $voto = $iscrizione->getVoto();
    $voto_massimo = $iscrizione->getVoto_massimo();
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Modifica Dettaglio Iscrizione</h4>
</div>
<div class="modal-body">
    <form method="post" action="backend-iscrizione-action.php?action=<?php echo $action; ?>"> 
        <div class="form-group hide">
            <label for="id_utente">Id_utente: </label>
            <input type="text" name="id_utente" id="id_utente" value="<?php echo $id_utente; ?>" class="form-control">
        </div>
        <div class="form-group hide">
            <label for="id_esame">Id_esame:</label>
            <input type="text" name="id_esame" id="id_esame" value="<?php echo $id_esame; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="pagato">Esame Pagato:</label>
            <select class="form-control" name="pagato">
                <option <?php if ($pagato): ?>selected<?php endif; ?> value="1">Esame Pagato</option>
                <option <?php if (!$pagato): ?>selected<?php endif; ?> value="0">Esame non pagato</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sostenuto">Esame Sostenuto:</label>
            <select class="form-control" name="sostenuto">
                <option <?php if ($sostenuto): ?>selected<?php endif; ?> value="1">Esame Sostenuto</option>
                <option <?php if (!$sostenuto): ?>selected<?php endif; ?> value="0">Esame non sostenuto</option>
            </select>
        </div>
        <div class="form-group">
            <label for="voto">Voto:</label>
            <input required type="number" min="0" max="100" name="voto" id="voto" value="<?php echo $voto; ?>" class="form-control">
        </div>
        <div class="form-group hide">
            <label for="voto_massimo">voto_massimo:</label>
            <input required type="number" min="0" max="100" name="voto_massimo" id="voto_massimo" value="<?php echo $voto_massimo; ?>" class="form-control">
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <input type="submit" value="Salva" class="btn btn-default">
    </form>
</div>



