<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alterar_servidores
 *
 * @author kenad
 */
    require_once 'classes/pagina.php';
    require_once 'DAO/DAO.php';
    require_once 'classes/Servidor.php';
    require_once 'DAO/ServidorDAO.php';    
    require_once 'classes/Cargo.php';
    require_once 'DAO/CargoDAO.php';

class alterar_servidores extends Pagina {
    //put your code here
    
    public function exibir_body() {
            parent::exibir_body();            
            ?>
                <h3 class = titulo>Cadastro de servidores</h3>
                
            <?php
            
            $this->exibir_form_cadastro_servidores();
        }
        
        
        public function exibir_form_cadastro_servidores(){
            $servidorDAO = new ServidorDAO();
            if(isset($_POST['matricula']))
            {
                $servidor = $servidorDAO->buscarPorMatricula($_POST['matricula']);
            }else{
                $servidor = $servidorDAO->buscarPorMatricula($_GET['matricula']);
            }
            
            
            if(filter_has_var(INPUT_GET, 'resultado')){
                $resultado = filter_input(INPUT_GET, 'resultado');
                if($resultado == 'sucesso'){
                    exibir_sucesso();
                }else if($resultado == 'erro')
                {
                    exibir_erro();
                
                }else if($resultado == 'erroSenha')
                {
                    exibir_erroSenha();
                }
            }
            
            ?>
                
                
            <div class="container">
                
                <div class="col-sm-1"></div>
                
                <div class="col-sm-10 formulario">
                    <form class="form-horizontal table" action="controller/logica_alterar_servidor.php" method="post">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="matricula">Matricula:</label>
                          <div class="col-sm-10">
                              <input type="text" required="required" class="form-control" 
                                     name="matricula" placeholder="Digite sua matricula" value="<?=$servidor->getMatricula()?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nome">Nome:</label>
                          <div class="col-sm-10">
                              <input type="text" required="required" class="form-control" 
                                     name="nome" placeholder="Digite seu nome" value="<?=$servidor->getNome()?>">
                          </div>
                        </div>  
                        
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="cpf">Cpf:</label>
                          <div class="col-sm-10">          
                              <input type="text" pattern="^\d{3}.\d{3}.\d{3}-\d{2}" 
                                     required="required" class="form-control" name="cpf" 
                                     placeholder="000.000.000-00" value="<?=$servidor->getCpf()?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Email:</label>
                          <div class="col-sm-10">          
                              <input type="email" required="required" 
                                     class="form-control" name="email" 
                                     placeholder="servidor@email.com" value="<?=$servidor->getEmail()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="senha">Senha:</label>
                          <div class="col-sm-10">          
                            <input type="password" required="required"
                                   class="form-control" name="senha" 
                                   placeholder="Digite sua senha" value="<?=$servidor->getSenha()?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="senha"> Confirmar senha:</label>
                          <div class="col-sm-10">          
                            <input type="password" required="required" 
                                   class="form-control" name="confirmacao" 
                                   placeholder="Confirmar senha" value="<?=$servidor->getSenha()?>">
                          </div>
                        </div>
                        <div class="form-group">
                            <?php
                                $cargoDAO = new CargoDAO();
                                $cargo = $cargoDAO->buscarPorId($servidor->getCargo());
                                $cargo = (object)$cargo;
                            ?>
                            <label class="control-label col-sm-2">Seu cargo atual é:</label>
                            <label class="control-label col-sm-2"><?=$cargo->nome?></label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cargo"> Novo cargo: </label>
                            <div class="col-sm-10">
                                
                                <select id="cargoSelecionado" name="cargo" class="selectpicker form-control">
                                    <?php
                                        $cargos = listagemCargo();
                                        foreach($cargos as $cargo) : ?>
                                            <option value="<?=$cargo['id']?>"><?=$cargo['nome']?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-lg btn-warning btn-block botao">Alterar Informações</button>
                          </div>
                        </div>
                        
                  </form>
                    
                </div>
            </div>
            <?php    
        }
        
    }
    
    $t = new alterar_servidores();
    
    $t->set_titulo('Cadastro de servidores');

    
    $t->display();
    
    function exibir_sucesso(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-success col-sm-10">
                    <strong>O Servidor foi cadastrado com sucesso!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function exibir_erro(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-danger col-sm-10">
                    <strong>O Servidor não foi cadastrado!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function exibir_erroSenha(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-danger col-sm-10">
                    <strong>As senhas não conferem!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function listagemCargo()
    {
        $cargoDAO = new CargoDAO();
        $cargos = $cargoDAO->listarTodos();
        return $cargos;
    }
        ?>
}
