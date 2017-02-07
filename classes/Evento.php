<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
    require_once("Servidor.php");

class Evento
{
    private $nome_evento;
    private $local_evento;
    private $periodo_evento;
    private $abrangencia_evento; 
    private $servidor;
    private $id;
    
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNome_Evento()
    {
        return $this->nome_evento;
    }
    public function setNome_Evento($nome_evento)
    {
        $this->nome_evento = $nome_evento;
    }
    public function setLocal_Evento($local_evento)
    {
        $this->local_evento = $local_evento;
    }
    public function getLocal_Evento()
    {
        return $this->local_evento;
    }
    public function setServidor(Servidor $servidor)
    {
        $this->servidor = $servidor;
    }
    public function getServidor()
    {
        return $this->servidor;
    }
    public function getPeriodo_Evento()
    {
        return $this->periodo_evento;
    }
    public function setPeriodo_Evento($periodo_evento)
    {
        $this->periodo_evento = $periodo_evento;
    }
     public function getAbrangencia()
    {
        return $this->abrangencia_evento;
    }
    public function setAbrangencia($abrangencia_evento)
    {
        $this->abrangencia_evento = $abrangencia_evento;
    }
   

}
