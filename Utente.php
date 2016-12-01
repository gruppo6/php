<?php



class Utente {
    private $id;
    private $nome;
    private $cognome;
    private $username;
    private $password;
    private $amministratore;
    
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
    
    function __construct($id, $nome, $cognome, $username, $password, $amministratore) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->username = $username;
        $this->password = $password;
        $this->amministratore = $amministratore;
    }
    
    function eseguiInsert(){
        
        return 0;
    }
    
    function eseguiUpdate(){
        return 0;
    }
    
    function eseguiDelete(){
        return 0;
    }
    
}
