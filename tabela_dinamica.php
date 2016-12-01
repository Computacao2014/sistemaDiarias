<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabela_dinamica
 *
 * @author kenad
 */
require_once 'DAO/DAO.php';
require_once 'DAO/ServidorDAO.php';
class tabela_dinamica 
{
    private $colunas = array();
    private $dados = array();
    
    public function __construct(array $colunas) {
        $this->colunas = $colunas;
        $dao = new DAO();
        $servidores = new ServidorDAO($dao->getConexao());
        $this->dados = $servidores->listarTodos();
    }
    
    public function __construct1(array $colunas,array $dados)
    {
        $this->colunas=$colunas;
        $this->dados=$dados;
    
    }
    public function _construct2(array $colunas,array $busca)
    {
        $this->colunas = $colunas;
        $matricula = $busca[0];
        $nome =  $busca[1];
        $dao = new DAO();
        $servidor = new ServidorDAO($dao->getConexao());
        $this->dados = $servidor->buscarPorMatricula($matricula);
        
        
    }

    public function setDados(array $dados)
    {
        $this->dados = $dados;
    
    }
    public function setColunas(array $colunas)
    {
        $this->colunas = $colunas;
    }
    public function tabela($titulo)
    {
        ?>
        <h3 class="titulo"><?= $titulo?></h3>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
            <table class="tabelas table-condensed table-striped table-responsive ">
                <tr>
        <?php
            foreach ($this->colunas as $coluna)
            {
        ?>
                    <td><h4><strong><?= $coluna?></strong></h4></td>
        <?php
            }
        ?>
                </tr>
                
        <?php
            foreach ($this->dados as $dado)
            {
                ?>
                <tr>
                <?php
                    foreach ($dado as $item)
                    {
                ?>
                <td><?=$item?></td>
                <?php } ?>
                </tr>
                <?php } ?>
            </table>
            </div><!--Fim col-sm-6-->
            </div><!--Fim ROW-->
        <?php
    }
}
