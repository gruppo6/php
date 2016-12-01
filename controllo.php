<!DOCTYPE html>
<?php
include('session.php');
include 'connessione_db.php';

$pdo = Database::connect();
$sql = 'SELECT * FROM esami where 1';

Database::disconnect();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="img/favicon.ico"> -->

        <title>Pannello di Controllo</title>
    </head>

    <body>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id cert</th>
                        <th>data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['id_certificazione'] . '</td>';
                        echo '<td>' . $row['data'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

