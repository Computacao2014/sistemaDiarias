<?php

/**
 * Description of Projeto
 *
 * @author kenad
 */
class Projeto 
{
    private $id;
    private $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = nome;
    }
}
