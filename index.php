<?php
    require_once ('classes/pagina.php');
    //Extende da classe Pagina
    class Pagina_Principal extends Pagina{
        
        public function exibir_body() {
//            parent::exibir_body();//Metodo da classe PAI
            
            ?>
        <!-- Conteúdo -->
          <div id="conteudo">
            <!-- Conteúdo Interno -->
            <div class="container">
                <div class="row">                            
                    <div class="col-md-5 col-sm-5 col-xs-3"></div>

                    <div class="col-md-2 col-sm-2 col-xs-6">
                        <img class="img-responsive" src="img/logo_uespi.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-xs-1"></div>
                    <div class="col-sm-4 col-xs-10">
                        <div class="formulario">
                            <form autocomplete="off" class="form-signin" action="controller/logica_login.php" method="post">

                                <strong><h4>Matricula</h4></strong></br>
                                <input type="text" class="form-control entrada" id="inputMatricula" name="matricula">

                                <strong><h4>Senha</h4></strong></br>
                                <input type="password" id="inputPassword" class="form-control entrada" name="senha">
                                
                                <?php 
                                if(filter_has_var(INPUT_GET, 'resultado')){
                                    if(filter_input(INPUT_GET, 'resultado') == 'erro'){
                                    ?>
                                    <div class="alert alert-danger" style="margin-top: 10px;">
                                        <strong>Erro!</strong> Usuário e/ou senha inválidos!
                                    </div>
                                    <?php
                                    }
                                }
                                ?>
                                
                                
                                
                                <input type="submit" class="btn btn-lg btn-primary btn-block botao" value="Entrar">
                                <input class="btn btn-lg btn-danger btn-block botao" value="Recuperar senha">
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- /Conteúdo Interno -->
          </div><!-- /Conteúdo -->
            
            <?php
        }
        
    }
    
    $t = new Pagina_Principal(NULL);
    $t->set_titulo('Pagina inicial');
    
    
    $t->display();
    
?>