<?php

/**
 * Description of Endereco
 *
 * @author kenad
 */
class Endereco 
{
    private $id;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    private $estado;
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    
    public function getRua()
    {
        return $this->rua;
    }
    public function setRua($rua)
    {
        $this->rua=$rua;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        return $this->numero=$numero;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro=$bairro;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado=$estado;
    }
}
