<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModalidadeTransporteDAO
 *
 * @author root
 */
require_once 'classes/ModalidadeTransporte.php';

class ModalidadeTransporteDAO 
{
    private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    
    function inserir(ModalidadeTransporte $modalidade)
    {
        try {
            $query = "insert into modalidade_transporte(nome) values('{$modalidade->getNome()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
       $query = "select * from modalidade_transporte where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $modalidades = array();

        while($modalidade = mysqli_fetch_assoc($resultado))
        {
            array_push($modalidades,$modalidade);
        }

        return $modalidades;
    }
     
    
            
    function buscarPorNome($nome)
    {
        $query = "select * from modalidade_transporte where nome = '{$nome}'";

        $resultado = mysqli_query($conexao, $query);

        $modalidades = array();

        while($modalidade = mysqli_fetch_assoc($resultado))
        {
            array_push($modalidades,$modalidade);
        }

        return $modalidades;
    }
    
    function listarTodos()
    {
        $query = "select * from modalidade_transporte";

        $resultado = mysqli_query($conexao, $query);

        $modalidades = array();

        while($modalidade = mysqli_fetch_assoc($resultado))
        {
            array_push($modalidades,$modalidade);
        }

        return $modalidades;
    }
    
}
