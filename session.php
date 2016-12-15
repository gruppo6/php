<?php

include('config.php');
session_start();

// se abbiamo la sessione aperta faccio il check 
if (isset($_SESSION['login_user']) && $_SESSION['login_user'] != '') {
    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($db, "select id, username, amministratore, logo "
            . " from utenti"
            . " where username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['username'];
    $_SESSION['amministratore'] = $row['amministratore'];
    $_SESSION['logo'] = $row['logo'];
    $_SESSION['idUtente'] = $row['id'];
}