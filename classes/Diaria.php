<?php
    require_once("Servidor.php");
    require_once("Relatorio.php");
/**
 * Description of Diaria
 *
 * @author kenad
 */
class Diaria
{
    private $id;
    private $quantDiarias;
    private $objetivo;
    private $servidor;
    private $relatorio;
    private $trajeto;
    private $projeto;
    private $modalidade;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getQuantidadeDiarias()
    {
        return $this->quantDiarias;
    }
    public function setQuantidadeDiarias($quantidade)
    {
        $this->quantDiarias = $quantidade;
    }
    public function getObjetivo()
    {
        return $this->objetivo;
    }
    public function getServidor()
    {
        return $this->servidor;
    }
    public function setServidor($servidor)
    {
        $this->servidor=$servidor;
    }
    public function getRelatorio()
    {
        return $this->relatorio;
    }
    public function setRelatorio($relatorio)
    {
        $this->relatorio = $relatorio;
    }
    public function getProjeto()
    {
        return $this->$projeto;
    }
    public function setProjeto($projeto)
    {
        $this->projeto = $projeto;
    }
     public function getTrajeto()
    {
        return $this->$trajeto;
    }
    public function setTrajeto($trajeto)
    {
        $this->trajeto = $trajeto;
    }
     public function getModalidade()
    {
        return $this->$modalidade;
    }
    public function setModalidade($modalidade)
    {
        $this->modalidade = $modalidade;
    }
}
