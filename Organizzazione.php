<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organizzazione
 *
 * @author gianl
 */
class Organizzazione {
    private $id;
    private $nome;
    private $logo;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
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

    function setLogo($logo) {
        $this->logo = $logo;
    }
    
    function __construct($id, $nome, $logo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->logo = $logo;
    }
    
    public function insert() {
        $sql = "INSERT INTO organizzazione(nome, logo) "
                . "VALUES('$this->nome', '$this->logo')";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Modifica una certificazione esistente nel database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function update() {
        $sql = "UPDATE organizzazione 
                SET nome = '$this->nome',
                logo = '$this->logo',
                WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Cancella una certificazione dal database
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function delete() {
        $sql = "DELETE FROM organizzazione WHERE id = '$this->id'";
        return Helpers::executeCommand($sql);
    }
    
    /**
     * Riempie i campi dell'oggetto recuperando i dati dal DB a partire dall'id
     * @return bool Vero se la query è andata a buon fine, falso se ci sono stati errori
     */
    public function select() {
        $sql = "SELECT *
                FROM organizzazione
                WHERE id = '$this->id'";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if($row) {
            $this->nome = $row["nome"];
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
                FROM organizzazione";
        $link = Helpers::openConnection();
        $result = mysqli_query($link, $sql);
        if(!$result) return false;
        $list = array();
        while( $row = mysqli_fetch_assoc($result) ) {
            $c = new Proprietario($row["id"], $row["nome"], $row["logo"]);
            $list[] = $c;
        }
        mysqli_close($link);
        return $list;                
    }


}
