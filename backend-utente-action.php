<?php

include('session.php');
include 'connessione_db.php';
require_once "Helpers.php";
require_once "Utente.php";

if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Nessuna azione specificata.')";
    header("Location: backend-utente.php");
}

$action = $_GET["action"];
$esito = true;  // Flag in cui memorizzare se la query è andata bene
switch ($action) {
    case "insert":
        $esito = eseguiInsert();
        break;
    case "update":
        $esito = eseguiUpdate();
        break;
    case "delete":
        $esito = eseguiDelete();
        break;
    default:    // sostituisce la validazione con if()
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione imprevista.')";
        header("Location: backend-utente.php");
}

if ($esito) {    // Se è andato tutto bene torno alla lista degli utenti 
    $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', 'Utente salvato correttamente.')";    
    if ($_SESSION['amministratore']==1) {
        header("Location: backend-utente.php");
    } elseif ($_SESSION['amministratore']==0) {
        header("Location: backend.php");
    }
} else {    // Altrimenti mostro un messaggio di errore
    $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
    header("Location: backend-utente.php");
}

function eseguiInsert() {
    validaForm();
    extract($_POST);  
    $utente = new Utente($id, $nome, $cognome, $username, $password, $amministratore);
    return $utente->insert();
}

function eseguiUpdate() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (validaForm()) {
            extract($_POST);
            $utente = new Utente($id, $nome, $cognome, $username, $password, $amministratore);
            return $utente->update();
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function eseguiDelete() {
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1) {
        $_SESSION['messaggio'] = "notifyError('Errore', 'ID mancante o non valido.')";
        header("Location: backend-utente.php");
    }
    $utente = new Utente($_GET["id"]);
    return $utente->delete();
}

function validaForm() {
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
    $amministratore = $_POST['amministratore'];

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
    return $valid;
}