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
}
