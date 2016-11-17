<?php

/**
 * Description of Periodo
 *
 * @author kenad
 */
class Periodo 
{
    private $id;
    private $inicio;
    private $fim;
    
    public function __construct($inicio,$fim) 
    {
        $this->inicio = $inicio;
        $this->fim = $fim;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function getInicio()
    {
        return $this->inicio;
    }
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }
    public function getFim()
    {
        return $this->fim;
    }
    public function setFim($fim)
    {
        $this->fim = $fim;
    }
}
