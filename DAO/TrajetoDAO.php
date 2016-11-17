<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trajeto
 *
 * @author root
 */
require_once 'classes/Trajeto.php';
require_once 'classes/Endereco.php';
require_once 'DAO/EnderecoDAO.php';
require_once 'DAO/DAO.php';
class TrajetoDAO {
    
     private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    
     function inserir($trajeto)
    {
        $dao = new DAO();
        $enderecoDAO = new EnderecoDAO($dao->getConexao());
        $enderecoDAO->inserir($trajeto->getSaida());
        $trajeto->setSaida(array_shift($enderecoDAO->buscarEndereco($trajeto->getSaida()->getRua(),$trajeto->getSaida()->getCep(),$trajeto->getSaida()->getEstado())));
        $enderecoDAO->inserir($trajeto->getEntrada());
        $trajeto-> setEntrada(array_shift($enderecoDAO->buscaEnderecp($trajeto->getEntrada()->getRua(),$trajeto->getEntrada()->getCep(),$trajeto->getEntrada()->getEstado())));
        $query = "insert into trajeto(saida,chegada) values('{$trajeto -> getSaida()-> getId()}','{$trajeto->getEntrada()->getId()}')";

        mysqli_query($conexao, $query);
    }
    
     function buscarPorId($id)
    {
       $query = "select * from trajeto where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $trajetos = array();

        while($projeto = mysqli_fetch_assoc($resultado))
        {
            array_push($trajetos,$trajeto);
        }

        return $trajetos;
    }
    
    function listarTodos()
    {
        $query = "select * from projeto";

        $resultado = mysqli_query($conexao, $query);

        $projetos = array();

        while($endereco = mysqli_fetch_assoc($resultado))
        {
            array_push($projetos,$projeto);
        }

        return $projetos;
    }
    
}
