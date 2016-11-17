<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Servidor
{
    private $matricula;
    private $cpf;
    private $nome;
    private $cargo;
    private $senha;
    private $diariasSolicitadas = array();

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome=$nome;
    }
    public function getCargo()
    {
        return $this->cargo;
    }
    public function setCargo($cargo)
    {
        return $this->cargo = $cargo;
    }
    public function getDiarias()
    {
        return $this->diariasSolicitadas;
    }
    public function setDiarias($diarias)
    {
        return $this->diariasSolicitadas = $diarias;
    }

}
