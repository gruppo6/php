<?php

require_once "session.php";
require_once "Helpers.php";
require_once "Certificazione.php";
require_once "Organizzazione.php";

if (!isset($_GET["action"])) {
    $_SESSION['messaggio'] = "notifyError('Errore', 'Nessuna azione specificata')";
    header("Location: backend.php");
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
        $_SESSION['messaggio'] = "notifyError('Errore', 'Azione Non Prevista')";
        header("Location: backend.php");
}

if ($esito === false) {
    $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
    header("Location: backend-certificazione.php");
} else {
    $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', '')";
    header("Location: backend-certificazione.php");
}

function eseguiInsert() {
    $valid = validaForm();
    $validImg = validaImg();
    if ($valid == $validImg) {
        extract($_POST);    // Creo $id, $nome, $codCatastale, $provincia da $_POST
        /*
         * private $id;
          private $id_organizzazione;
          private $nome;
          private $logo;
         */
        $certificazione = new Certificazione($id_organizzazione, $nome, $descrizione, $logo);
        return $certificazione->insert();
    }
}

function eseguiUpdate() {
    $valid = validaForm();
    $validImg = validaImg();
    if ($valid == $validImg) {
        extract($_POST);
        $certificazione = new Certificazione($id_organizzazione, $nome, $descrizione, $logo);
        return $certificazione->update();
    }
}

function eseguiDelete() {
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1) {
        die("Errore! Id mancante o non valido");
    }
    $certificazione = new Certificazione($_GET["id"]);
    return $certificazione->delete();
}

function validaForm() {
    // Validazione del form
    if (empty($_POST)) {
        $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Non è stato inviato nessun form.')";
        header("Location: backend-certificazione.php");
    }

    $id_organizzazioneError = null;
    $nomeError = null;
    $descrizioneError = null;
    $logoError = null;

    // keep track post values
    $id_organizzazione = $_POST['id_organizzazione'];
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $logo = $_POST['logo'];

    // validate input
    $valid = true;
    if (empty($id_organizzazione)) {
        $id_organizzazioneError = 'Per favore seleziona la organizzazione';
        $valid = false;
    }

    if (empty($nome)) {
        $nomeError = 'Per favore inserisci il nome';
        $valid = false;
    }

    if (empty($descrizione)) {
        $descrizioneError = 'Per favore inserisci la descrizione';
        $valid = false;
    }

    if (empty($logo)) {
        $logoError = 'Per favore inserisci il logo';
        $valid = false;
    }

    return $valid;
}

function validaImg() {

    // validate input
    $validImg = true;
    // Validazione file
    if (empty($_FILES)) {
        $logoError .= "<p>Attenzione! Nessun file caricato.</p>";
        $validImg = false;
    } else {
        // Se la cartella per le immagini non esiste, la creo
        if (!file_exists("img"))
            mkdir("img");

        $target_file = "img/certificazione/" . basename($_FILES["logo"]["name"]);
        if ((exif_imagetype($_FILES["logo"]["tmp_name"]) != IMAGETYPE_JPEG) OR 
                (exif_imagetype($_FILES["logo"]["tmp_name"]) != IMAGETYPE_PNG) OR
                (exif_imagetype($_FILES["logo"]["tmp_name"]) != IMAGETYPE_GIF)) {
            $logoError .= "<p>Errore! Il file non è in formato corretto.</p>";
            $validImg = false;
        }

        // Controllo la dimensione in pixel usando la libreria GD
        $misure = getimagesize($_FILES["logo"]["tmp_name"]);
        $larghezza = $misure[0];
        $altezza = $misure[1];
        if ($larghezza > 1000 || $altezza > 1000) {
            $logoError .= "<p>L'immagine supera i 1000px di lato.</p>";
            $validImg = false;
        }

        if ($logoError == "") {   // Se non ci sono errori, copio il file
            if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                $logoError .= "<p>Errore in fase di caricamento del file.</p>";
                $validImg = false;
            }
        }
    }
    return $validImg;
}
