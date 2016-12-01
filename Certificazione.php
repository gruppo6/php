<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conversazione
 *
 * @author gianl
 */
class Certificazione {
    private $id;
    private $id_organizzazione;
    private $nome;
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

    function setLogo($logo) {
        $this->logo = $logo;
    }
    
    function __construct($id, $id_organizzazione, $nome, $logo) {
        $this->id = $id;
        $this->id_organizzazione = $id_organizzazione;
        $this->nome = $nome;
        $this->logo = $logo;
    }
    



}
