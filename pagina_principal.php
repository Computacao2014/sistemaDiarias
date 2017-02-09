<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'classes/pagina.php';
require_once 'DAO/DiariaDAO.php';
require_once 'DAO/EventoDAO.php';
require_once 'classes/Evento.php';
require_once 'classes/Trabalho.php';

class PaginaPrincipal extends Pagina
{   
    public function exibir_body() {
        parent::exibir_body();            
        ?>
        <h3 class = titulo>Diárias solicitadas</h3>
        <?php
        
        ?>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <table class=" table table-striped table-bordered">
                <tr>
                    <td><h4><strong>Nome do Evento</strong></h4></td>
                    <td><h4><strong>Quantidade</strong></h4></td>
                    <td><h4><strong>Data de Inicio</strong></h4></td>
                    <td><h4><strong>Data de Fim</strong></h4></td>
                    <td><h4><strong>Cancelar?</strong></h4></td>
                </tr>
                
        <?php
            $diariaDAO = new DiariaDAO();
            $dados = $diariaDAO->listarTodos(); //ALTERAR AQUI
            if($dados !=NULL)
            {
                foreach ($dados as $dado)
                {
                    $objeto = new Diaria();
                    $objeto->setId($dado['id_diaria']);
                    $objeto->setViagem($dado['id_viagem']);
                    $objeto->setEvento($dado['id_evento']);
                    $objeto->setTrabalho($dado['id_trabalho']);
                    $objeto->setAuxilio($dado['id_historico']);
                    $objeto->setProducoes($dado['id_producao']);
                    $objeto->setServidor($dado['id_usuario']);
                    
                    $eventoDAO = new EventoDAO();
                    $evento = $eventoDAO->buscarPorId($objeto->getEvento());
                    $objeto->setEvento($evento);
                    
                    $viagemDao = new ViagemDAO();
                    $viagem = $viagemDao->buscarPorId($objeto->getViagem());
                    $objeto->setViagem($viagem);
                    ?>
                    <tr>
                        <td id = "nomeEvento"><?=$objeto->getEvento()->getNome_Evento()?></td>
                        <td id = "quantidade"><?=$objeto->getViagem()->getQuantidade_de_dias()?></td>
                        <td id = "dataInicio"><?=$objeto->getEvento()->getPeriodo_Evento()->getInicio()?></td>
                        <td id = "dataFim"><?=$objeto->getEvento()->getPeriodo_Evento()->getFim()?></td>
                        <td>
                            <form action="controller/remover_servidor.php?id=<?=$servidor->matricula?>" method="post">
                                <input type="hidden" name="matricula" value="<?=$servidor->matricula?>" />
                                <button class="btn btn-danger">remover</button>
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
                        <div class="alert alert-danger col-sm-11">
                            <strong>Nenhuma diária solicitada!</strong> 
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div><!--Fim col-sm-6-->
            <div class="col-sm-1"></div>
            </div><!--Fim ROW-->
        <?php
    }
    
}
$pag = new PaginaPrincipal();
$pag->display();
