<?php

/**
 * Description of ClasseDAO
 *
 * @author kenad
 */
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once 'DAO.php';
require_once "$root/classes/Cargo.php";

class CargoDAO
{

    function inserir(Cargo $cargo)
    {
        try {
            $query = "insert into cargo(nome,id_perfil_diaria) values('{$cargo->getNome()}',{$cargo->getPerfilDiaria()})";
            $con = DAO::getConexao();
            $resultado = $con->query($query);
            
            $con->close();
            return $resultado;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $con->close();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from cargo where id = '{$id}'";
        $con = DAO::getConexao();
        $resultado = $con->query($query);

        $cargos = array();

        while($cargo = mysqli_fetch_assoc($resultado))
        {
            array_push($cargos,$cargo);
        }
        $con->close();
        return $cargos[0];
    }
    function buscarPorNome($nome)
    {
        $query = "select * from cargo where nome = '{$nome}'";
        $con = DAO::getConexao();
        $resultado = $con->query($query);

        $cargos = array();

        while($cargo = mysqli_fetch_assoc($resultado))
        {
            array_push($cargos,$cargo);
        }
        $con->close();
        return $cargo;
    }
    function listarTodos()
    {
        $query = "select * from cargo order by nome asc";
        $con = DAO::getConexao();
        $resultado = $con->query($query);

        $cargos = array();

        while($cargo = mysqli_fetch_assoc($resultado))
        {
            array_push($cargos,$cargo);
        }
        $con->close();
        return $cargos;
    }
}
