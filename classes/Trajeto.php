<?php

/**
 * Description of Trajeto
 *
 * @author kenad
 */

require_once("Endereco.php");

class Trajeto 
{
    private $id;
    private $entrada;
    private $saida;
    
    function __construct()
    {
        $this->entrada = new Endereco();
        $this->saida = new Endereco();
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function getEntrada()
    {
        return $this->entrada;
    }
    public function setEntrada($entrada)
    {
        $this->entrada = $entrada;
    }
    public function getSaida()
    {
        return $this->saida;
    }
    public function setSaida($saida)
    {
        $this->saida = $saida;
    }
}
