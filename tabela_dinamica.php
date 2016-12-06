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
        $servidores = new ServidorDAO();
        $this->dados = $servidores->listarTodos();
    }
    
    public function __construct1(array $colunas,array $dados)
    {
        $this->colunas=$colunas;
        $this->dados=$dados;
    
    }
    

    public function setDados(array $dados)
    {
        $this->dados = $dados;
    
    }
    public function setColunas(array $colunas)
    {
        $this->colunas = $colunas;
    }
    public function tabela($titulo,$matricula,$nome)
    {
        if($matricula != "" || $nome != "")
        {
            $buscaServidor = new ServidorDAO();
            $this->dados = $buscaServidor->buscaPorMatriculaOuNome($matricula, $nome);
            
        }
        ?>
        <h3 class="titulo"><?= $titulo?></h3>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
            <table class="tabelas table-condensed table-striped table-responsive">
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
            if($this->dados !=NULL)
            {
                foreach ($this->dados as $dado)
                {
                    $servidor = (object)$dado;
                    ?>
                    <tr>
                        <td><?=$servidor->matricula?></td>
                        <td><?=$servidor->cpf?></td>
                        <td><?=$servidor->email?></td>
                        <td><?=$servidor->nome?></td>
                        <td>
                            <form>
                                <button type="submit" method="post">Alterar</button>
                            </form>
                        </td>
                        <td>
                            <form>
                                <button type="submit" method="post">Remover</button>
                            </form>
                        </td>
                    </tr>

                    <?php
                }
            ?>
            </table>
            <?php
            }else
            {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="alert alert-danger col-sm-9">
                            <strong>Nenhum servidor foi encontrado  !</strong> 
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div><!--Fim col-sm-6-->
            </div><!--Fim ROW-->
       
            <?php
        }            
    }

