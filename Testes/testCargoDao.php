<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testCargoDao
 *
 * @author kenad
 */

class PerfilDiaria {
    //put your code here

    private $id;
    private $nome;
    private $valorNoEstado;
    private $valorForaEstado;
    private $valor_regiao_a;
    private $valor_regiao_b;
    private $valor_regiao_c;
    private $valor_regiao_d;
    
    public function __construct()
    {
        
    }

    public function __construct1($nome,$valorNoEstado,$valorForaEstado,$regiaoA,$regiaoB,$regiaoC,$regiaoD)
    {
        $this->setNome($nome);
        $this->setValorNoEstado($valorNoEstado);
        $this->setValorForaEstado($valorForaEstado);
        $this->setValorRegiaoA($regiaoA);
        $this->setValorRegiaoB($regiaoB);
        $this->setValorRegiaoC($regiaoC);
        $this->setValorRegiaoD($regiaoD);
        
    }

    public function getId()
    {
       return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getValorNoEstado()
    {
        return $this->valorNoEstado;
    }
    public function setValorNoEstado($valor)
    {
        $this->valorNoEstado = (float)$valor;
    }
    
    public function getValorForaEstado()
    {
        return $this->valorForaEstado;
    }
    public function setValorForaEstado($valor)
    {
        $this->valorForaEstado = (float)$valor;
    }
    public function getValorRegiaoA()
    {
       return $this->valor_regiao_a;
    }
    public function setValorRegiaoA($valor)
    {
        $this->valor_regiao_a=(float)$valor;
    }
    public function getValorRegiaoB()
    {
       return $this->valor_regiao_b;
    }
    public function setValorRegiaoB($valor)
    {
        $this->valor_regiao_b=(float)$valor;
    }
    public function getValorRegiaoC()
    {
       return $this->valor_regiao_c;
    }
    public function setValorRegiaoC($valor)
    {
        $this->valor_regiao_c=(float)$valor;
    }
    public function getValorRegiaoD()
    {
       return $this->valor_regiao_d;
    }
    public function setValorRegiaoD($valor)
    {
        $this->valor_regiao_d=(float)$valor;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome=$nome;
    }
}

class Cargo {
    
    private $id;
    private $nome;
    private $perfilDiaria;
    
    function __construct() {
        $this->perfilDiaria = new PerfilDiaria();
    }
    
    function __construct1($nome,$perfil)
    {
       
        $this->nome = $nome;
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
        $this->nome = $nome;
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

class CargoDaoTest extends PHPUnit_Framework_TestCase
{
    static function getConexao(){
         $con = new mysqli('localhost', 'root', '', 'sistemadiarias');
         $con->set_charset("utf8");
         if(mysqli_connect_errno()){
             echo 'Codigo do erro '. mysqli_connect_errno();
             exit();
         }
         $con->set_charset("utf8");
         
         return $con;
    }
    function inserir(Cargo $cargo)
    {
        try {
            $query = "insert into cargo(nome,id_perfil_diaria) values('{$cargo->getNome()}',{$cargo->getPerfilDiaria()})";
            $con = getConexao();
            $resultado = $con->query($query);
            
            $con->close();
            return $resultado;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $con->close();
            return false;
        }
    }
    public function testInserirCargos()
    {
        $cargo1 = new Cargo();
        $cargo1->setNome("SECRETÁRIO");
        $perfil = new PerfilDiaria();
        $perfil->setId(1);
        $cargo1->setPerfilDiaria($perfil);
        
        $cargo2 = new Cargo();
        $cargo2->setNome("DIRETOR");
        $cargo2->setPerfilDiaria($perfil);
        
        $cargo3=new Cargo();
        $cargo3->setNome("PROFESSOR ADJUNTO");
        $cargo3->setPerfilDiaria($perfil);
        
        $this->assertEquals(true, inserir($cargo1));
        $this->assertEquals(true, inserir($cargo2));
        $this->assertEquals(true, inserir($cargo3));
        
        $perfil->setId(2);
        $cargo1->setPerfilDiaria($perfil);
        $cargo2->setPerfilDiaria($perfil);
        $cargo3->setPerfilDiaria($perfil);
        
        $this->assertEquals(false, $cargoDAO->inserir($cargo1));
        $this->assertEquals(false, $cargoDAO->inserir($cargo2));
        $this->assertEquals(false, $cargoDAO->inserir($cargo3));
    }
}
