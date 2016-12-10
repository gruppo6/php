<?php

require_once "Certificazione.php";

if (!isset($_GET["action"])) {
    die("Errore! Nessuna azione specificata.");
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
        die("Errore! Azione non prevista.");
}

if ($esito) {    // Se è andato tutto bene torno alla lista dei certificazione
    header("Location: backend.php");
} else {    // Altrimenti mostro un messaggio di errore
    die("Attenzione! Errore nel database.");
}

function eseguiInsert() {
    validaForm();
    extract($_POST);    // Creo $_POST
    /*
    private $id;
    private $id_certificazione;
    private $data;
    
     */
    $esame = new Esame($id, $id_certificazione, $data);
    return $esame->insert();
}

function eseguiUpdate() {
    validaForm();
    extract($_POST);
    $esame = new Esame($id, $id_certificazione, $data);
    return $esame->update();
}

function eseguiDelete() {
    if( !isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1 ) {
        die("Errore! Id mancante o non valido");
    }
    $esame = new Esame($_GET["id"]);
    return $esame->delete();
}

function validaForm() {
    // Validazione del form
    if (empty($_POST)) {
        die("Attenzione! Non è stato inviato nessun form");
    }
    $messaggio_errore = "";
    $campi = array($id_certificazione, $data);
    foreach ($campi as $c) {
        if (!isset($_POST[$c]) || trim($_POST[$c]) == "") {
            $messaggio_errore .= "<p>Il campo <mark>$c</mark> è obbligatorio.</p>";
        }
    }
    if (!empty($messaggio_errore)) { // Ho trovato errori nel form
        die($messaggio_errore);
    }
}

?>