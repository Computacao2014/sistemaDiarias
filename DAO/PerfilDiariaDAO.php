<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/PerfilDiaria.php');

class PerfilDiariaDAO {
    //put your code here

    function inserir(PerfilDiaria $perfil_diaria)
    {
        try {
            $query = "insert into perfil_diaria(nome,valor_no_estado,valor_fora_estado,valor_regiao_a,valor_regiao_b,valor_regiao_c,valor_regiao_d) values()";

            mysqli_query(DAO::getConexao(), $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from perfil_diaria where id = '{$id}'";

        $resultado = mysqli_query(DAO::getConexao(), $query);

        $perfil_diaria = array();

        while($per = mysqli_fetch_assoc($resultado))
        {
            array_push($perfil_diaria,$perfil_diaria);
        }

        return $perfil_diaria;
    }
    function buscarPorNome($classe)
    {
        $query = "select * from perfil_diaria where nome = '{$classe}'";

        $resultado = mysqli_query(DAO::getConexao(), $query);

        $perfil_diaria = array();

        while($perfil_diaria = mysqli_fetch_assoc($resultado))
        {
            array_push($perfil_diaria,$perfil_diaria);
        }

        return $perfil_diaria;
    }
    function listarTodos()
    {
        $query = "select * from perfil_diaria";

        $resultado = mysqli_query(DAO::getConexao(), $query);

        $cargos = array();

        while($perfil_diaria = mysqli_fetch_assoc($resultado))
        {
            array_push($perfil_diaria,$perfil_diaria);
        }

        return $perfil_diaria;
    }
}
?>