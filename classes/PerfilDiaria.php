<?php

/**
 * Description of PerfilDiaria
 *
 * @author kenad
 */
class PerfilDiaria {
    //put your code here

    private $id;
    private $nome;
    private $valorNoEstado;
    private $valorForaEstado;
    private $valor_regiao_a;
    private $valor_regiao_b;
    private $valor_regiao_c;
    private $valor_regiao_d;
    
    public function __construct1()
    {
        
    }

    public function __construct($nome,$valorNoEstado,$valorForaEstado,$regiaoA,$regiaoB,$regiaoC,$regiaoD)
    {
    }

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
    public function getValorRegiaoA()
    {
       return $this->valor_regiao_a;
    }
    public function setValorRegiaoA($valor)
    {
        $this->valor_regiao_a=$valor;
    }
    public function getValorRegiaoB()
    {
       return $this->valor_regiao_b;
    }
    public function setValorRegiaoB($valor)
    {
        $this->valor_regiao_b=$valor;
    }
    public function getValorRegiaoC()
    {
       return $this->valor_regiao_c;
    }
    public function setValorRegiaoC($valor)
    {
        $this->valor_regiao_c=$valor;
    }
    public function getValorRegiaoD()
    {
       return $this->valor_regiao_d;
    }
    public function setValorRegiaoD($valor)
    {
        $this->valor_regiao_d=$valor;
    }
}
