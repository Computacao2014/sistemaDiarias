<?php

class Pagina {
    
    private $titulo;
    
    function Pagina(){
        $this->titulo = "Titulo da pagina";
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
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">SistemaDiaria</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">Solicitar diárias</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="cadastro_servidores.php"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
                <li>
                    <a class="btn btn-link btn-lg" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </a>
                </li>
              </ul>
            </div>
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