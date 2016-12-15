<?php

require_once('session.php');
require_once 'connessione_db.php';
require_once "Helpers.php";
require_once "Iscrizione.php";

if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Nessuna azione specificata.')";
    header("Location: backend-esame.php");
}

$action = $_GET["action"];
$esito = true;  // Flag in cui memorizzare se la query è andata bene
switch ($action) {
    case "insert":
        $esito = eseguiInsert($_SESSION['idUtente'], $_GET["id"]);
        break;
    case "update":
        $esito = eseguiUpdate();
        break;
    case "delete":
        $esito = eseguiDelete();
        break;
    default:    // sostituisce la validazione con if()
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione imprevista.')";
        header("Location: backend-esame.php");
}

if ($esito) {    // Se è andato tutto bene torno alla lista dei certificazione
    $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', 'Iscrizione salvata correttamente.')";
    header("Location: backend-esame-form.php?action=update&id=" . $_POST["id_esame"] . "");
} else {    // Altrimenti mostro un messaggio di errore
    $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
    header("Location: backend-esame.php");
}

function eseguiInsert($idUtente, $idEsame) {
    $iscrizione = new Iscrizione(0, $idUtente, $idEsame, 0, 0, 0, 100);
    return $iscrizione->insert();
}

function eseguiUpdate() {
    validaForm();
    extract($_POST);
    $iscrizione = new Iscrizione($id, $id_utente, $id_esame, $pagato, $sostenuto, $voto, $voto_massimo);
    return $iscrizione->update();
}

function eseguiDelete() {
    if( !isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1 ) {
        $_SESSION['messaggio'] = "notifyError('Errore', 'ID mancante o non valido.')";
        header("Location: backend-esame.php");
    }
    $iscrizione = new Iscrizione($_GET["id"]);
    return $iscrizione->delete();
}

function validaForm() {
    // keep track validation errors
    $id_utenteError = null;
    $id_esameError = null;
    $pagatoError = null;
    $sostenutoError = null;
    $votoError = null;
    $voto_massimoError = null;
    
    // variabili che gestiscono gli errori del form
    $id_utente = $id_esame = $pagato = $sostenuto = $voto = $voto_massimo = NULL;
    
    // variabili dove salviamo il valore del form
    $id_utente = $_POST['id_utente'];
    $id_esame = $_POST['id_esame'];
    $pagato = $_POST['pagato'];
    $sostenuto = $_POST['sostenuto'];
    $voto = $_POST['voto'];
    $voto_massimo = $_POST['voto_massimo']; 
    
    // controlli sui campi
    $valid = true;
    if (empty($id_utente)) {
        $id_utenteError = "Per favore inserisci id utente";
        $valid = false;
    }

    if (empty($id_esame)) {
        $id_esameError = "Per favore inserisci il cognome";
        $valid = false;
    }

    if (empty($pagato)) {
        $pagatoError = "Per favore inserisci il tipo pagamento";
        $valid = false;
    }

    if (empty($sostenuto)) {
        $sostenutoError = "Per favore inserisci se svolto o meno";
        $valid = false;
    }
    
    if (empty($voto)) {
        $votoError = "Per favore inserisci il voto";
        $valid = false;
    }
    
    if (empty($voto_massimo)) {
        $voto_massimo = "Per favore inserisci il voto massimo";
        $valid = false;
    }
    return $valid;
}

