<?php
    require_once 'classes/pagina.php';
    
    
    class Pagina_Cadastro_Servidores extends Pagina{
        public function exibir_body() {
            parent::exibir_body();            
            ?>
                <h1>Pagina de cadastro de servidores</h1>
                
            <?php
            
            $this->exibir_form_cadastro_servidores();
        }
        
        
        public function exibir_form_cadastro_servidores(){
            ?>
            <div class="container formulario">
                
                <h2>Cadastro de servidores</h2>
              <form class="form-horizontal">
                  
                
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Nome:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                  </div>
                </div>  
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="senha">Senha:</label>
                  <div class="col-sm-10">          
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="control-label col-sm-2" for="senha">Confirme a senha:</label>
                  <div class="col-sm-10">          
                    <input type="password" class="form-control" name="confirma_senha" placeholder="Confirme sua senha">
                  </div>
                </div>
                
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label><input type="checkbox"> Lembre-me</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                  </div>
                </div>
              </form>
              
            </div>
            <?php    
        }
        
    }
    
    $t = new Pagina_Cadastro_Servidores();
    
    $t->set_titulo('Cadastro de servidores');
    
    
    $t->display();
    
?>
