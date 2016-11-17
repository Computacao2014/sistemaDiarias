<?php

/**
 * Description of ClasseDAO
 *
 * @author kenad
 */
require_once('DAO/DAO.php');
require_once('classes/Cargo.php');

class CargoDAO
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    function inserir($cargo)
    {

        $query = "insert into cargo(nome,classe,id_perfil_diaria) values('{$cargo->getNome()}','{$cargo->getClasse()}','{$cargo->getPerfilDiaria()->getId()}')";

        mysqli_query($conexao, $query);
    }
    function buscarPorId($id)
    {
        $query = "select * from cargo where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $cargos = array();

        while($cargo = mysqli_fetch_assoc($resultado))
        {
            array_push($cargos,$cargo);
        }

        return $cargo;
    }
    function buscarPorNome($nome)
    {
        $query = "select * from cargo where nome = '{$nome}'";

        $resultado = mysqli_query($conexao, $query);

        $cargos = array();

        while($cargo = mysqli_fetch_assoc($resultado))
        {
            array_push($cargos,$cargo);
        }

        return $cargo;
    }
    function listarTodos()
    {
        $query = "select * from cargo";

        $resultado = mysqli_query($conexao, $query);

        $cargos = array();

        while($cargo = mysqli_fetch_assoc($resultado))
        {
            array_push($cargos,$cargo);
        }

        return $cargo;
    }
}
