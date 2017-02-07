<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
    require_once("Servidor.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class conta_bancaria
{
    private $conta;
    private $banco;
    private $agencia;
    private $servidor;
    
    public function setServidor(Servidor $servidor)
    {
        $this->servidor = $servidor;
    }
    public function getServidor()
    {
        return $this->servidor;
    }
    public function setConta($codigo_banco)
    {
        $this->conta = $codigo_banco;
    }
    public function getConta()
    {
        return $this->conta;
    }
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }
    public function getBanco()
    {
        return $this->banco;
    }
    public function setAgencia($codigo_agencia)
    {
        $this->agencia = $codigo_agencia;
    }
    public function getAgencia()
    {
        return $this->agencia;
    }
    
  
   

}
