<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Esame
 *
 * @author gianl
 */
class Esame {
    private $id;
    private $id_certificazione;
    private $data;
    
    function getId() {
        return $this->id;
    }

    function getId_certificazione() {
        return $this->id_certificazione;
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

    function setData($data) {
        $this->data = $data;
    }
    
    function __construct($id, $id_certificazione, $data) {
        $this->id = $id;
        $this->id_certificazione = $id_certificazione;
        $this->data = $data;
    }
    
    public function insert() {
        $sql = "INSERT INTO esami(id_certificazione, data) "
                . "VALUES($this->id_certificazione, '$this->data)";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Modifica una certificazione esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function update() {
        $sql = "UPDATE esami 
                SET id_certificazione = '$this->id_certificazione', 
                data = '$this->data',
                WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Cancella una certificazione dal database
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
        if(!$result) return false;
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if($row) {
            $this->id_certificazione = $row["id_certificazione"];
            $this->data = $row["data"];
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Estrae tutti gli esami dal DB
     * @return mixed Una lista di oggetti certificazione oppure false in caso di errore
     */
    public static function selectAll() {
        $sql = "SELECT *    
                FROM esami";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $list = array();
        while( $row = mysqli_fetch_assoc($result) ) {
            $c = new Proprietario($row["id"], $row["id_certificazione"], $row["data"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;                
    }


}
