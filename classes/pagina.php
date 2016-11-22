<?php

class Pagina {
    
    private $titulo;
    private $servidorLogado;
    
    function Pagina(){
        $this->titulo = "Titulo da pagina";
    }
    function getServidorLogado()
    {
        return $this->servidorLogado;
    }

    final function display(){
        echo "<!DOCTYPE html>\n";
        echo "<html lang='pt-br'>\n";
        echo "<head>\n";
        $this->exibir_titulo();
        $this->exibir_config();
        
        echo "</head>\n<body>\n";
        $this->exibir_body();
        
        echo "</body>\n</html>";
    }
    
    final function set_titulo($titulo){
        $this->titulo = $titulo;
    }
            
    function exibir_titulo(){
        echo "<title>".$this->titulo."</title>\n";
    }
    
    private function exibir_config(){
        ?>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
          <link rel="stylesheet" href="css/estilo.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="bootstrap/js/bootstrap.min.js"></script>
        <?php
        
    }
    
    function exibir_body(){
        $this->exibir_navbar();
        
    }
            
    function exibir_navbar(){
        ?>
          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Sistemas Diarias</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="pagina_principal.php">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servidores
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro_servidores.php">Cadastrar Servidor</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Diaria
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Solicitar</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil Diaria
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro_perfil_de_diaria.php">Cadastrar</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          
          <!--Login Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-xg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Entrar no sistema</h4>
                </div>
                <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha">
                      </div>
                      <div class="checkbox">
                          <label><input type="checkbox" class="checkbox" disabled>Lembrar-me</label>
                      </div>
                        
                      <div class="row">
                          <div class="col-xs-1"></div>
                          
                          <button type="submit" class="btn btn-success col-xs-5">Login</button>
                          
                          <div class="col-xs-4">
                              <a href="#">
                                <button class="btn btn-warning">Esqueci a senha</button>
                              </a>
                          </div>
                          
                      </div>  
                      
                    </form>
                </div>
                  
                <div class="modal-footer row">
                    <div class="col-xs-3">
                        <a href="cadastro_servidores.php">
                          <button class="btn btn-default">Não possuo cadastro</button>
                        </a>
                    </div>
                    
                    <div class="col-xs-5">
                        
                    </div>
                    
                    <div class="col-xs-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                  
                </div>
              </div>
            </div>
          </div>
        
        
        <?php
    }
}



?>