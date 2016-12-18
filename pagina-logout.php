<?php
define('ABSPATH', dirname(__FILE__) . "/msg/system");

include_once(ABSPATH . "/_installation.php");
include_once(ABSPATH . "/_config.php");
include_once(ABSPATH . "/_translate.php");
include_once(ABSPATH . "/includes/functions.php");
include_once(ABSPATH . "/includes/user.class.php");

session_start();
$user->logout();
if (session_destroy()) {
    header("Location: index.php");
}