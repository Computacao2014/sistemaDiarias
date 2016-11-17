<?php
    require_once("ModalidadeTransporte.php");
    require_once("Servidor.php");
/**
 * Description of Relatorio
 *
 * @author kenad
 */

class Relatorio
{
    private $id;
    private $relato;
    private $modalidadeTransporte;
    private $servidor;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getRelato()
    {
        return $this->relato;
    }
    public function setRelato($relato)
    {
        $this->relato = $relato;
    }

    public function getModalidadeTransporte()
    {
        return $this->modalidadeTransporte;
    }

    public function setModalidadeTransporte($modalidade)
    {
        $this->modalidadeTransporte = $modalidade;
    }
    public function getServidor()
    {
        return $this->servidor;
    }
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }
}
