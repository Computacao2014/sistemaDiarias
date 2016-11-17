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
        $saida;
        $chegada;
        $enderecoDAO->inserir($trajeto->getSaida());
        $trajeto->setSaida();
        
        $query = "insert into trajeto(nome) values('{$projeto->getNome()}')";

        mysqli_query($conexao, $query);
    }
}
