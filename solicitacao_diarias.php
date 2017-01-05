<?php
    require_once 'classes/pagina.php';
    require_once 'DAO/DAO.php';
    require_once 'classes/Servidor.php';
    require_once 'DAO/ServidorDAO.php';    
    require_once 'classes/Cargo.php';
    require_once 'DAO/CargoDAO.php';
    
    class Pagina_Solicitacao_Diarias extends Pagina{
        public function exibir_body() {
            parent::exibir_body();            
            ?>
                <h3 class = titulo>Solicitação de Diárias</h3>
                
            <?php
            
            $this->exibir_form_solicitacao_diarias();
        }
        public function exibir_form_solicitacao_diarias(){
            
            ?>
              <?php  
                 
                 $codigo_banco;
                 $banco;
                 $codigo_agencia;
                 //
                 $nome_evento;
                 $local_evento;
                 $periodo_evento;
                 $abrangencia_evento; //internacional, nacional; regional;
                 $titulo_trabalho;
                 $titulo_projeto_cadastrado_prop;
                 $check_auxilio; //checkbox para sim ou nao, se sim, textfield para quantANos
                 $justificativa;
                 $tipo_auxilio; //checkbox para passagem, diarias, ajuda financeira, e textfiel para descricao
                 $pontuacao;
                 $importancia;
                 
                    
              ?>
            
                
            <div class="container">
                
                <div class="col-sm-1"></div>
                
                <div class="col-sm-10 formulario">
                    <form class="form-horizontal table" action="controller/logica_solicitacao_diarias.php" method="post">
                       
                        
                       
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="codigo_banco">Codigo do Banco:</label>
                          <div class="col-sm-10">          
                              <input type="number" required="required" class="form-control" name="codigo_banco" placeholder="Digite o Código do Banco">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="banco">Banco:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="banco" placeholder="Digite o Nome do Banco">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="codigo_agencia">Codigo da Agencia:</label>
                          <div class="col-sm-10">          
                              <input type="number" required="required" class="form-control" name="codigo_agencia" placeholder="Digite o Código da Agencia">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nome_evento">Nome do Evento:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="nome_evento" placeholder="Digite o Nome do Evento">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="local_evento">Local do Evento:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="local_evento" placeholder="Digite o Local do Evento">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="periodo_evento">Periodo do Evento:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="periodo_evento" placeholder="Digite o Periodo do Evento">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="abrangencia_evento"> Abrangência do Evento:</label>
                          <p>
                              <select name="abrangencia_evento">
                                  <option value ="1">Regional</option>
                                  <option value ="2">Nacional</option>
                                  <option value ="3">Internacional</option>
                              </select>
                          </p>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="titulo_trabalho">Título do Trabalho:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="titulo_trabalho" placeholder="Digite o Título do Trabalho">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="titulo_projeto_cadastrado_prop">Título do Projeto Cadastrado Na PROP:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="titulo_projeto_cadastrado_prop" placeholder="Digite o Título do Projeto Cadastrado Na PROP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="check_auxilio"> Recebeu Auxilio Nos Anos Anteriores:</label>
                          <p>
                              <select name="check_auxilio">
                                  <option value ="1">Sim</option>
                                  <option value ="2">Nao</option>
                              </select>
                          </p>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="justificativa">Em caso afirmativo, indique os anos:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="justificativa" placeholder="Digite os anos">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="tipo_auxilio"> Auxilio Solicitado:</label>
                          <p>
                              <select name="tipo_auxilio">
                                  <option value ="1">Passagem</option>
                                  <option value ="2">Diaria</option>
                                  <option value ="3">Ajuda Financeira</option>
                              </select>
                          </p>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="pontuacao">Pontuação de Produção Científica nos Ultimos 5 Anos:</label>
                          <div class="col-sm-10">          
                              <input type="number" required="required" class="form-control" name="pontuacao" placeholder="Digite sua pontuacao">
                          </div>
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                              <a href="#" onclick="window.open('http://google.com', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">ANEXAR ARQUIVOS COMPROVANDO PONTUAÇÃO CIENTÍFICA</a>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="importancia">Apenas para Cursos/Treinamentos, diga a importância:</label>
                          <div class="col-sm-10">          
                              <input type="text" required="required" class="form-control" name="importancia" placeholder="Digite a importância">
                          </div>
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-lg btn-primary btn-block botao">Cadastrar</button>
                          </div>
                        </div>
                        
                  </form>
                    
                </div>
            </div>
            <?php    
        }
        
    }
    
    $t = new Pagina_Solicitacao_Diarias();
    
    $t->set_titulo('Solicitação de Diárias');
    
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
                    <strong>O Servidor não foi contratado!</strong> 
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
        $dao = new DAO();
        $cargoDAO = new CargoDAO($dao->getConexao());
        $cargos = $cargoDAO->listarTodos();
        $dao->fecharConexao();
        return $cargos;
    }
        ?>
