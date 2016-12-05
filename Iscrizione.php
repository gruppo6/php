<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Iscrizione {
    
    private $id;
    private $id_utente;
    private $id_esame;
    private $pagato;
    private $sostenuto;
    private $voto;
    private $voto_massimo;
    
    function getId() {
        return $this->id;
    }

    function getId_utente() {
        return $this->id_utente;
    }

    function getId_esame() {
        return $this->id_esame;
    }

    function getPagato() {
        return $this->pagato;
    }

    function getSostenuto() {
        return $this->sostenuto;
    }

    function getVoto() {
        return $this->voto;
    }

    function getVoto_massimo() {
        return $this->voto_massimo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_utente($id_utente) {
        $this->id_utente = $id_utente;
    }

    function setId_esame($id_esame) {
        $this->id_esame = $id_esame;
    }

    function setPagato($pagato) {
        $this->pagato = $pagato;
    }

    function setSostenuto($sostenuto) {
        $this->sostenuto = $sostenuto;
    }

    function setVoto($voto) {
        $this->voto = $voto;
    }

    function setVoto_massimo($voto_massimo) {
        $this->voto_massimo = $voto_massimo;
    }
    
    function __construct($id, $id_utente, $id_esame, $pagato, $sostenuto, $voto, $voto_massimo) {
        $this->id = $id;
        $this->id_utente = $id_utente;
        $this->id_esame = $id_esame;
        $this->pagato = $pagato;
        $this->sostenuto = $sostenuto;
        $this->voto = $voto;
        $this->voto_massimo = $voto_massimo;
    }
    
    
    public function insert() {
        $sql = "INSERT INTO iscrizione(id_utente, id_esame, pagato, sostenuto, voto, voto_massimo) "
                . "VALUES($this->id_utente, '$this->id_esame', '$this->pagato', '$this->sostenuto', '$this->voto', '$this->voto_massimo')";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Modifica una certificazione esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function update() {
        $sql = "UPDATE iscrizione
                SET id_utente = '$this->id_utente', 
                id_esame = '$this->id_esame',
                pagato = '$this->pagato',
                sostenuto = '$this->sostenuto',
                voto = '$this->voto',
                voto_massimo = '$this->voto_massimo',
                WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Cancella una certificazione dal database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function delete() {
        $sql = "DELETE FROM iscrizione WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Riempie i campi dell'oggetto recuperando i dati dal DB a partire dall'id
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function select() {
        $sql = "SELECT *
                FROM iscrizione
                WHERE id = '$this->id'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if($row) {
            $this->id_utente = $row["id_utente"];
            $this->id_esame = $row["id_esame"];
            $this->pagato = $row["pagato"];
            $this->sostenuto = $row["sostenuto"];
            $this->voto = $row["voto"];
            $this->voto_massimo = $row["voto_massimo"];
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
                FROM iscrizione";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $list = array();
        while( $row = mysqli_fetch_assoc($result) ) {
            $c = new Proprietario($row["id"], $row["id_utente"], $row["id_esame"], $row["pagato"], $row["sostenuto"], $row["voto"], $row["voto_massimo"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;                
    }
    



}
