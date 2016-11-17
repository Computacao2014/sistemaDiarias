<?php

/**
 * Description of PerfilDiaria
 *
 * @author kenad
 */
class PerfilDiaria {
    //put your code here

    private $id;
    private $valorNoEstado;
    private $valorForaEstado;
    private $classe;
    
    
    public function getId()
    {
       return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getValorNoEstado()
    {
        return $this->valorNoEstado;
    }
    public function setValorNoEstado($valor)
    {
        $this->valorNoEstado = $valor;
    }
    
    public function getValorForaEstado()
    {
        return $this->valorForaEstado;
    }
    public function setValorForaEstado($valor)
    {
        $this->valorForaEstado = $valor;
    }
    
    public function getClasse()
    {
        return $this->classe;
    }
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }
}
