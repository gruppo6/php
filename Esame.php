<?php

require_once "Helpers.php";

/**
 * Description of Esame
 *
 * @author gianl
 */
class Esame {

    private $id;
    private $id_certificazione;
    private $nome;
    private $descrizione;
    private $data;

    function getId() {
        return $this->id;
    }

    function getId_certificazione() {
        return $this->id_certificazione;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescrizione() {
        return $this->descrizione;
    }

    function getData() {
        return $this->data;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_certificazione($id_certificazione) {
        $this->id_certificazione = $id_certificazione;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }

    function setData($data) {
        $this->data = $data;
    }

    function __construct($id, $id_certificazione = "", $nome = "", $descrizione = "", $data = "") {
        $this->id = $id;
        $this->id_certificazione = $id_certificazione;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->data = $data;
    }

    /**
     * crea un esame esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function insert() {
        $sql = "INSERT INTO esami(id_certificazione, nome, descrizione, data) "
                . "VALUES($this->id_certificazione, '$this->nome', "
                . " '$this->descrizione', '$this->data')";
        return Helpers::executeCommand($sql);
    }

    /**
     * Modifica un esame esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function update() {
        $sql = "UPDATE esami 
                SET id_certificazione = '$this->id_certificazione', 
                nome = '$this->nome', 
                descrizione = '$this->descrizione',    
                data = '$this->data',
                WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }

    /**
     * Cancella un esame dal database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function delete() {
        $sql = "DELETE FROM esami WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }

    /**
     * Riempie i campi dell'oggetto recuperando i dati dal DB a partire dall'id
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function select() {
        $sql = "SELECT *
                FROM esami
                WHERE id = '$this->id'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if ($row) {
            $this->id_certificazione = $row["id_certificazione"];
            $this->nome = $row["nome"];
            $this->descrizione = $row["descrizione"];
            $this->data = $row["data"];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Estrae tutti gli esami dal DB
     * @return mixed Una lista di oggetti esami oppure false in caso di errore
     */
    public static function selectAll() {
        $sql = "SELECT *    
                FROM esami";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Esame($row["id"], $row["id_certificazione"], 
                    $row["nome"], $row["descrizione"], $row["data"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }

    /**
     * Estrae tutti gli esami prenotati per utente dal DB
     * @return mixed Una lista di oggetti esami oppure false in caso di errore
     */
    public static function selectPrenotati($idUtente) {
        $sql = "SELECT t1.id, t1.id_certificazione, t1.nome, t1.descrizione, " .
                " t1.data FROM esami " .
                " AS t1 INNER JOIN iscrizioni AS t2 ON t1.id = t2.id_esame " .
                " WHERE t2.sostenuto = 0 " .
                " AND t2.id_utente = '$idUtente' AND t1.data > NOW()";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Esame($row["id"], $row["id_certificazione"], 
                    $row["nome"], $row["descrizione"], $row["data"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }

    /**
     * Estrae tutti gli esami da fare (attivi) per utente dal DB
     * @return mixed Una lista di oggetti esami oppure false in caso di errore
     */
    public static function selectDaFare($idUtente) {
        $sql = "SELECT t1.id, t1.id_certificazione, t1.nome, " .
                " t1.descrizione, t1.data FROM esami " .
                " AS t1 INNER JOIN iscrizioni AS t2 ON t1.id = t2.id_esame " .
                " WHERE t2.sostenuto = 0 " .
                " AND t2.id_utente = '$idUtente'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Esame($row["id"], $row["id_certificazione"], 
                    $row["nome"], $row["descrizione"], $row["data"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }

    /**
     * Estrae tutti gli esami fatti per utente dal DB
     * @return mixed Una lista di oggetti esami oppure false in caso di errore
     */
    public static function selectFatti($idUtente) {
        $sql = "SELECT t1.id, t1.id_certificazione, t1.nome, t1.descrizione, " .
                " t1.data FROM esami " .
                " AS t1 INNER JOIN iscrizioni AS t2 ON t1.id = t2.id_esame " .
                " WHERE t2.sostenuto = 1 " .
                " AND t2.id_utente = '$idUtente'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Esame($row["id"], $row["id_certificazione"], 
                    $row["nome"], $row["descrizione"], $row["data"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }
    
    /**
     * Estrae tutti gli esami prenotati per utente dal DB
     * @return mixed Una lista di oggetti esami oppure false in caso di errore
     */
    public static function selectDaPrenotare($idUtente) {     
        $sql = "SELECT t1.id, t1.id_certificazione, t1.nome, t1.descrizione,  " .
                " t1.data FROM esami " .
                " AS t1 LEFT JOIN iscrizioni AS t2 ON t1.id = t2.id_esame " .
                " WHERE t1.data > NOW() AND t1.id NOT IN(SELECT t3.id FROM esami " .
                " AS t3 INNER JOIN iscrizioni AS t4 ON t3.id = t4.id_esame " . 
                " WHERE t4.id_utente = '$idUtente')";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $c = new Esame($row["id"], $row["id_certificazione"], 
                    $row["nome"], $row["descrizione"], $row["data"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;
    }
}
