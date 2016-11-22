<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiariaDAO
 *
 * @author root
 */
require_once 'classes/Projeto.php';
require_once 'classes/Trajeto.php';
require_once 'classes/Relatorio.php';
require_once 'classes/ModalidadeTransporte.php';
require_once 'classes/Servidor.php';

class DiariaDAO {
    
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    public function inserir($diaria)
    {
        $projetoDAO = new ProjetoDAO($this->conexao);
        $projetoDAO->inserir($diaria->getProjeto());
        $diaria->setProjeto($projetoDAO->buscarPorNome($diaria->getNome()));
        
        $trajetoDAO = new TrajetoDAO($this->conexao);
        $trajetoDAO->inserir($diaria->getTrajeto());
        $diaria->setTrajeto($trajetoDAO->buscarPorEnderecos($diaria->getTrajeto()->getSaida(), $diaria->getTrajeto()->getChegada()));
        
        $modalidadeDAO = new ModalidadeTransporteDAO($this->conexao);
        $modalidadeDAO->inserir($diaria->getModalidade());
        $diaria->setModalidade($modalidadeDAO->buscarPorNome($diaria->getModalidade()->getNome()));
        
        $query = "insert into diaria_viagem(quant_dias,objeto_viagem,data_inicial,data_final,relato,id_projeto,id_trajeto,id_modalidade,id_servidor) values('{$diaria->getQuantidadeDiarias()}','{$diaria->getObjetivo()}','{}')";

        mysqli_query($conexao, $query);
    }
}
