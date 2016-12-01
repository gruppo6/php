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
    
    



}
