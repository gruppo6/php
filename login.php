<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, md5($_POST['password']));
    $check = "";
    $sql = "SELECT id FROM utenti WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {


        $_SESSION['login_user'] = $myusername;
        $check = '<div class="alert alert-success">Bentornato!</div>';
        header("location: controllo.php");
    } else {
        $check = '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Errore:</span>Password o Login errata</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="img/favicon.ico"> -->

        <title>Infobasic</title>
    </head>

    <body>
        <div>
            <form action = "" method = "post" class="form-signin">
                <h2>Per favore accedi</h2>
                <label for="inputEmail" class="sr-only">Indirizzo Email</label>
                <input type = "text" name = "username" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type = "password" name = "password" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Ricordami
                    </label>
                </div>
                <button type="submit">Accedi</button>
            </form>

            <?php
            if (isset($check)) {
                echo $check;
            }
            ?>  
        </div>
    </body>
</html>
