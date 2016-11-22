<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/PerfilDiaria.php');

class PerfilDiariaDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    function inserir($perfil_diaria)
    {

        $query = "insert into perfil_diaria(valor_no_estado,valor_fora_estado,classe) values('{$perfil_diaria->getValorNoEstado()}','{$perfil_diaria->getValorForaEstado()->getClasse()}')";

        mysqli_query($conexao, $query);
    }
    function buscarPorId($id)
    {
        $query = "select * from perfil_diaria where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $perfil_diaria = array();

        while($per = mysqli_fetch_assoc($resultado))
        {
            array_push($perfil_diaria,$perfil_diaria);
        }

        return $perfil_diaria;
    }
    function buscarPorClasse($classe)
    {
        $query = "select * from perfil_diaria where classe = '{$classe}'";

        $resultado = mysqli_query($conexao, $query);

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

        $resultado = mysqli_query($conexao, $query);

        $cargos = array();

        while($perfil_diaria = mysqli_fetch_assoc($resultado))
        {
            array_push($perfil_diaria,$perfil_diaria);
        }

        return $perfil_diaria;
    }
}
?>