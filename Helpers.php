<?php
/**
 * Classe con metodi di utilità da usare nel resto dell'applicazione
 *
 * @author Marco Buccione
 */
class Helpers {
    const DB_SERVER = "localhost";
    const DB_NAME = "corsi";
    const DB_USER = "root";
    const DB_PWD = "";
    
    /**
     * Apre la connessione al DB
     * @return resource Il collegamento alla connessione creata
     */
    public static function openConnection() {
        $link = mysqli_connect(Helpers::DB_SERVER, Helpers::DB_USER, Helpers::DB_PWD, Helpers::DB_NAME);
        mysqli_set_charset($link, "utf8");
        return $link;
    }
    
    /**
     * Apre la connessione ed esegue un comando di modifica dati (insert, update o delete)
     * @param string $sql Comando SQL da eseguire
     * @return bool Vero se il comando è andato a buon fine, falso altrimenti
     */
    public static function executeCommand($sql) {
        $link = openConnection();
        $result = mysqli_query($link, $sql);
        mysqli_close($link);
        return $result;
    }
}
