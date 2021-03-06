<?php

require_once 'session.php';

//setto la pagina attiva
if (isset($_SERVER['REQUEST_URI'])) {
    $_SESSION['activePage'] = "backend-messaggistica.php";
}

define('ABSPATH', dirname(__FILE__) . "/msg/system");

include_once(ABSPATH . "/_installation.php");
include_once(ABSPATH . "/_config.php");
include_once(ABSPATH . "/_translate.php");
include_once(ABSPATH . "/includes/functions.php");
include_once(ABSPATH . "/includes/user.class.php");


$todo = $_REQUEST["todo"];
$action = $_REQUEST["action"];

if ($action == "logout") {
    $user->logout();
    $alert = __g("you_were_logged_out");
}

if ($todo == "attachment" && allowed('GET')) {
    require_once(ABSPATH . "/presenters/attachment.php");
} elseif ($todo == "uploader" && allowed('POST')) {
    header('Content-Type: application/json');
    require_once(ABSPATH . "/presenters/uploader.php");
} elseif ($todo == "ajax" && allowed('POST')) {
    header('Content-Type: application/json');
    require_once(ABSPATH . "/includes/actions.php");
    require_once(ABSPATH . "/presenters/ajax.php");
} elseif (allowed('GET')) {
    if ($user->logged) {
        require_once(ABSPATH . "/presenters/page-room.php");
    } else {
        require_once(ABSPATH . "/presenters/page-index.php");
    }
}

$db->close();
exit;
