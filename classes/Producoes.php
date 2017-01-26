<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Producoes
{
    private $pontuacao;
    private $importancia;
    
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
