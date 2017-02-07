<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'classes/pagina.php';
require_once 'DAO/DiariaDAO.php';

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
            $dados = NULL; //ALTERAR AQUI
            if($dados !=NULL)
            {
                foreach ($dados as $dado)
                {
                    $servidor = (object)$dado;
                    ?>
                    <tr>
                        <td id = "nomeEvento"></td>
                        <td id = "quantidade"></td>
                        <td id = "dataInicio"></td>
                        <td id = "dataFim"></td>
                        <td>
                            <form action="alterar_servidores.php" method="post" >
                                <input type="hidden" name="matricula" value="<?=$servidor->matricula?>" />
                                <button class="btn btn-warning">alterar</button>
                            </form>
                        </td>
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
