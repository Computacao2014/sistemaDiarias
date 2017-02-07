<?php
    require_once("Cargo.php");
    require_once("Diaria.php");

class Trabalho
{
    private $titulo_do_trabalho;
    private $titulo_do_trabalho_cadastrado_na_prop;
    
    public function setTitulo_do_trabalho($titulo_do_trabalho)
    {
        $this->titulo_do_trabalho = $titulo_do_trabalho;
    }
    public function getTitulo_do_trabalho()
    {
        return $this->titulo_do_trabalho;
    }
    
    public function setTitulo_do_trabalho_cadastrado_na_prop($titulo_do_trabalho_cadastrado_na_prop)
    {
        $this->titulo_do_trabalho_cadastrado_na_prop = $titulo_do_trabalho_cadastrado_na_prop;
    }
    public function getTitulo_do_trabalho_cadastrado_na_prop()
    {
        return $this->titulo_do_trabalho_cadastrado_na_prop;
    }
    
}
