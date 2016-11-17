<?php
    require_once("PerfilDiaria.php");
/**
 * Description of Cargo
 *
 * @author kenad
 */
class Cargo {
    
    private $id;
    private $nome;
    private $classe;
    private $perfilDiaria;
    
    function __construct() {
        $this->perfilDiaria = new PerfilDiaria();
    }
    
    function __construct1($id,$nome,$classe,$perfil)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->classe = $classe;
        $this->perfilDiaria = $perfil;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = nome;
    }
    
    public function getClasse()
    {
        return $this->classe;
    }
    public function setClasse($classe)
    {
        $this->classe = classe;
    }
    public function getPerfilDiaria()
    {
        return $this->perfilDiaria;
    }
    public function setPerfilDiaria($perfil)
    {
        $this->perfilDiaria = $perfil;
    }
}
