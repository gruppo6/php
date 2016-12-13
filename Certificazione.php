<?php

/**
 * Description of Certificazione
 *
 * @author gianl
 */
class Certificazione {
    private $id;
    private $id_organizzazione;
    private $nome;
    private $descrizione;
    private $logo;
    
    function getId() {
        return $this->id;
    }

    function getId_organizzazione() {
        return $this->id_organizzazione;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescrizione() {
        return $this->descrizione;
    }

    function getLogo() {
        return $this->logo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_organizzazione($id_organizzazione) {
        $this->id_organizzazione = $id_organizzazione;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function __construct($id=0, $id_organizzazione="", $nome="", $descrizione="", $logo="") {
        $this->id = $id;
        $this->id_organizzazione = $id_organizzazione;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->logo = $logo;
    }
 
    /**
     * Salva una nuova certificazione nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function insert() {
        $sql = "INSERT INTO certificazioni(id_organizzazione, nome, descrizione, logo) "
                . "VALUES($this->id_organizzazione, '$this->nome', '$this->descrizione','$this->logo')";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Modifica una certificazione esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function update() {
        $sql = "UPDATE certificazioni 
                SET id_organizzazione = '$this->id_organizzazione', 
                nome = '$this->nome',
                descrizione = '$this->descrizione',
                logo = '$this->logo',
                WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Cancella una certificazione dal database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function delete() {
        $sql = "DELETE FROM certificazioni WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Riempie i campi dell'oggetto recuperando i dati dal DB a partire dall'id
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function select() {
        $sql = "SELECT *
                FROM certificazioni
                WHERE id = '$this->id'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if($row) {
            $this->id_organizzazione = $row["id_organizzazione"];
            $this->nome = $row["nome"];
            $this->descrizione = $row["descrizione"];
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
                FROM certificazioni";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $list = array();
        while( $row = mysqli_fetch_assoc($result) ) {
            $c = new Certificazione($row["id"], $row["id_organizzazione"], $row["nome"], $row["descrizione"], $row["logo"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;                
    }
}
