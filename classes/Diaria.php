<?php
/**
 * Description of Diaria
 *
 * @author kenad
 */
class Diaria
{
    private $id;
    private $id_usuario;
    private $viagem;
    private $evento;
    private $trabalho;
    private $historico_auxilio;
    private $producoes;
    private $perfilDiaria;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    
    public function setIdPerfilDiaria($idPerfil)
    {
        $this->perfilDiaria = $idPerfil;
    }
    public function getIdPerfilDiaria()
    {
        return $this->perfilDiaria;
    }
    
    public function setIDServidor($idServidor)
    {
        $this->id_usuario = $idServidor;
    }
    public function getIdServidor()
    {
        return $this->id_usuario;
    }
    public function setIdViagem($viagem)
    {
        $this->viagem = $viagem;
    }
    public function getIdViagem()
    {
        return $this->viagem;
    }
    public function setIdEvento($evento)
    {
        $this->evento = $evento;
    }
    
    public function getIdEvento()
    {
        return $this->evento;
    }
    public function setIdTrabalho($trabalho)
    {
        $this->trabalho = $trabalho;
    }
    public function getIdTrabalho()
    {
        return $this->trabalho;
    }
    public function setIdAuxilio($auxilio)
    {
        $this->historico_auxilio = $auxilio;
    }
    public function getIdAuxilio()
    {
        return $this->historico_auxilio;
    }
    public function setIdProducoes($producoes)
    {
        $this->producoes = $producoes;
    }
    public function getIdProducoes()
    {
        return $this->producoes;
    }
}
