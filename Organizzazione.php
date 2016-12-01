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



}
