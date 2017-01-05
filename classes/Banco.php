<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Banco
{
    private $codigo_banco;
    private $banco;
    private $codigo_agencia;
    
    
    public function getCodigo_Banco()
    {
        return $this->codigo_banco;
    }
    public function setCodigo_Banco($codigo_banco)
    {
        $this->codigo_banco = $codigo_banco;
    }
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }
    public function getBanco()
    {
        return $this->banco;
    }

    public function getCodigo_Agencia()
    {
        return $this->codigo_agencia;
    }
    public function setCodigo_Agencia($codigo_agencia)
    {
        $this->codigo_agencia = $codigo_agencia;
    }
  
   

}
