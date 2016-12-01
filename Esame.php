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


}
