<?php
    require_once("Cargo.php");
    require_once("Diaria.php");

class Viagem
{
    private $id;
    private $quantidade_de_dias;
    private $data_de_partida;
    private $data_de_chegada;
    
    
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setQuantidade_de_dias($quantidade_de_dias)
    {
        $this->quantidade_de_dias = $quantidade_de_dias;
    }
    public function getQuantidade_de_dias()
    {
        return $this->quantidade_de_dias;
    }
    
    public function setData_de_partida($data_de_partida)
    {
        $this->data_de_partida = $data_de_partida;
    }
    public function getData_de_partida()
    {
        return $this->data_de_partida;
    }
    
    public function setData_de_chegada($data_de_chegada)
    {
        $this->data_de_chegada = $data_de_chegada;
    }
    public function getData_de_chegada()
    {
        return $this->data_de_chegada;
    }
    

}
