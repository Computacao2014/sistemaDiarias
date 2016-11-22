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
                    <div class="col-xs-5"></div>

                    <div class="col-xs-2">
                        <img class="img-responsive" src="img/logo_uespi.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-6">
                        <form autocomplete="off" class="form-signin formulario" action="controller/logica_login.php" method="post">


                        <table class="table" >
                          <tr>
                            <td colspan="2"><h2 class="form-signin-heading">Efetue Login</h2></td>
                          </tr>
                          <tr>
                            <td>Matricula:</td>
                            <td><input type="text" class="form-control" id="inputMatricula" name="matricula"></td>
                          </tr>
                          <tr>
                            <td>Senha:</td>
                            <td><input type="password" id="inputPassword" class="form-control" name="senha"></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td><input type="submit" class="btn btn-lg btn-primary btn-block" value="Entrar"></td>
                          </tr>
                        </table>
                                <div class="centralizado"><a href="recuperarconta">Recuperar Senha</a> <br/><a href="dadosmatricula/consultar.php" class="btn btn-danger">Ainda não recebeu a matricula?</a></div>
                      </form>
                    </div>
                </div>

            </div> <!-- /Conteúdo Interno -->
          </div><!-- /Conteúdo -->
            
            <?php
        }
        
    }
    
    $t = new Pagina_Principal();
    $t->set_titulo('Pagina inicial');
    
    
    $t->display();
    
?>