<?php
    require_once("Servidor.php");
    require_once("Relatorio.php");
    require_once("Viagem.php");
    require_once("Evento.php");
    require_once("Trabalho.php");
    require_once("Auxilios.php");
    require_once("Producoes.php");
/**
 * Description of Diaria
 *
 * @author kenad
 */
class Diaria
{
    private $id;
    
    private $viagem;
    private $evento;
    private $trabalho;
    private $auxilio;
    private $producoes;
    
    public function Diaria(){
        $this->viagem = new Viagem();
        $this->evento = new Evento();
        $this->trabalho = new Trabalho();
        $this->auxilio = new Auxilios();
        $this->producoes = new Producoes();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setViagem($viagem)
    {
        $this->viagem = $viagem;
    }
    public function getViagem()
    {
        return $this->viagem;
    }
    public function setEvento($evento)
    {
        $this->evento = $evento;
    }
    public function getEvento()
    {
        return $this->evento;
    }
    public function setTrabalho($trabalho)
    {
        $this->trabalho = $trabalho;
    }
    public function getTrabalho()
    {
        return $this->trabalho;
    }
    public function setAuxilio(Auxilios $auxilio)
    {
        $this->auxilio = $auxilio;
    }
    public function getAuxilio()
    {
        return $this->auxilio;
    }
    public function setProducoes($producoes)
    {
        $this->producoes = $producoes;
    }
    public function getProducoes()
    {
        return $this->producoes;
    }
}
