<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
    require_once("Servidor.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Auxilios
{
    private $id;
    private $ja_recebeu_auxilio;
    private $quantidade_de_anos;
    private $tipo_auxilio_solicitado;
    private $servidor;
    
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }    
    public function setJa_recebeu_auxilio($ja_recebeu_auxilio)
    {
        $this->ja_recebeu_auxilio = $ja_recebeu_auxilio;
    }
    public function getJa_recebeu_auxilio()
    {
        return $this->ja_recebeu_auxilio;
    }
    
    public function setQuantidade_de_anos($quantidade_de_anos)
    {
        $this->quantidade_de_anos = $quantidade_de_anos;
    }
    public function getQuantidade_de_anos()
    {
        return $this->quantidade_de_anos;
    }
    
    public function setTipo_auxilio_solicitado($tipo_auxilio_solicitado)
    {
        $this->tipo_auxilio_solicitado = $tipo_auxilio_solicitado;
    }
    public function getTipo_auxilio_solicitado()
    {
        return $this->tipo_auxilio_solicitado;
    }
    public function setServidor(Servidor $servidor)
    {
        $this->servidor = $servidor;
    }
    public function getServidor()
    {
        return $this->servidor;
    }
}
