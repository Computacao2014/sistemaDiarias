<?php


$root = $_SERVER['DOCUMENT_ROOT']."/sistemaDiarias";
require_once "$root/DAO/DAO.php";
require_once "$root/DAO/CargoDAO.php";
require_once "$root/classes/Cargo.php";
require_once "$root/classes/PerfilDiaria.php";

class CargoDaoTest extends PHPUnit_Extensions_Database_TestCase
{
    private $conn = null;
    public function getConnection()
    {
        if(!$this->conn)
        {
            $this->conn = DAO::getConexao();
        }
        return $this->conn;
    }


    public function testInserirCargos()
    {
        $cargoDAO = new CargoDAO();
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
        
        $this->assertEquals(true, $cargoDAO->inserir($cargo1));
        $this->assertEquals(true, $cargoDAO->inserir($cargo2));
        $this->assertEquals(true, $cargoDAO->inserir($cargo3));
        
        $perfil->setId(2);
        $cargo1->setPerfilDiaria($perfil);
        $cargo2->setPerfilDiaria($perfil);
        $cargo3->setPerfilDiaria($perfil);
        
        $this->assertEquals(false, $cargoDAO->inserir($cargo1));
        $this->assertEquals(false, $cargoDAO->inserir($cargo2));
        $this->assertEquals(false, $cargoDAO->inserir($cargo3));
    }
}
