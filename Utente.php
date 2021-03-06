<?php

require_once "Helpers.php";

/**
 * Description of Utente
 *
 * @author gianl
 */
class Utente {

    private $id;
    private $nome;
    private $cognome;
    private $username;
    private $password;
    private $amministratore;
    private $logo;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCognome() {
        return $this->cognome;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getAmministratore() {
        return $this->amministratore;
    }

    function getLogo() {
        return $this->logo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCognome($cognome) {
        $this->cognome = $cognome;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAmministratore($amministratore) {
        $this->amministratore = $amministratore;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function __construct($id, $nome = "", $cognome = "", $username = "", $password = "", $amministratore = "", $logo = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->username = $username;
        $this->password = $password;
        $this->amministratore = $amministratore;
        $this->logo = $logo;
    }

    public function insert() {
        $sql = "INSERT INTO utenti(nome, cognome, username, password, amministratore) "
                . "VALUES('$this->nome', '$this->cognome', '$this->username', '" . md5($this->password) . "', $this->amministratore)";
        return Helpers::executeCommand($sql);
    }

    /**
     * Modifica una certificazione esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function update() {
        $sql = "UPDATE utenti"
                . " SET nome = '$this->nome',"
                . " cognome = '$this->cognome',"
                . " username = '$this->username',"
                . " password = '" . md5($this->password) . "',"
                . " amministratore = $this->amministratore "
                . " WHERE id = $this->id";
        return Helpers::executeCommand($sql);
    }

    /**
     * Aggiorna l'immagine di profilo
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function updateImg() {
        $sql = "UPDATE utenti"
                . " SET logo = '$this->logo'"
                . " WHERE id = $this->id";
        return Helpers::executeCommand($sql);
    }

    /**
     * Cancella una certificazione dal database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function delete() {
        $sql = "DELETE FROM utenti WHERE id = $this->id";
        return Helpers::executeCommand($sql);
    }

    /**
     * Riempie i campi dell'oggetto recuperando i dati dal DB a partire dall'id
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function select() {
        $sql = "SELECT *
                FROM utenti
                WHERE id = '$this->id'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result)
            return false;
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if ($row) {
            $this->nome = $row["nome"];
            $this->cognome = $row["cognome"];
            $this->username = $row["username"];
            $this->password = $row["password"];
            $this->amministratore = $row["amministratore"];
            $this->logo = $row["logo"];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Estrae tutti i certificazioni dal DB
     * @return mixed Una lista di oggetti certificazione oppure false in caso di errore
     */
    public static function selectAll() {
        $sql = "SELECT *    
                FROM utenti";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result)
            return false;
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Utente($row["id"], $row["nome"], $row["cognome"], $row["username"], $row["password"], $row["amministratore"], $row["logo"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }

    /**
     * Esegue il login al portale
     */
    public static function login($myusername, $mypassword) {
        $sql = "SELECT * FROM utenti WHERE username = '$myusername' and password = '" . md5($mypassword) . "'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result)
            return false;
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Utente($row["id"], $row["nome"], $row["cognome"], $row["username"], $row["password"], $row["amministratore"], $row["logo"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }

}
