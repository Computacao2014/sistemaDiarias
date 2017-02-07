<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
    require_once("Servidor.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Producoes
{
    private $pontuacao;
    private $importancia;
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
    public function setServidor(Servidor $servidor)
    {
        $this->servidor = $servidor;
    }
    public function getServidor()
    {
        return $this->servidor;
    }    
    public function setPontuacao($pontuacao)
    {
        $this->pontuacao = $pontuacao;
    }
    public function getPontuacao()
    {
        return $this->pontuacao;
    }
    
    public function setImportancia($importancia)
    {
        $this->importancia = $importancia;
    }
    public function getImportancia()
    {
        return $this->importancia;
    }
}
