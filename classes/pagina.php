<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/DAO/ServidorDAO.php";
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
        $this->verificaSessao();
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
    
    private function verificaSessao(){        
        session_start();
        if(!isset($_SESSION['servidor'])){//Se seção não exixtir
            header("Location: index.php?resultado=ecessonegado");
        }else{//Se a seção existir
            $servidorSessao = $_SESSION['servidor'];
            $servidorDao = new ServidorDAO();
            $servidorBanco = $servidorDao->buscarPorMatricula($servidorSessao->getMatricula());
            if($servidorBanco==NULL){//Se NÃO existir um servidor registrado com essa matricula
                header("Location: index.php?resultado=erro");
            }else{//Se existir um servidor registrado com essa matricula
                
                if($servidorBanco->getSenha()!=$servidorSessao->getSenha()){
                    header("Location: index.php?resultado=erro");
                }if($servidorBanco->getSenha()==$servidorSessao->getSenha()){
                    return true;
                }
            }
        }
    }

        private function exibir_config(){
        ?>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
          <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
          <link rel="stylesheet" href="css/estilo.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="bootstrap/js/bootstrap.min.js"></script>
          <script src="js/funcoes.js"></script>
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
                  <li><a href="pagina_principal.php">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servidores
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro_servidores.php">Cadastrar Servidor</a></li>
                    <li><a href="buscar_servidores.php">Buscar Servidor</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Diaria
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="solicitacao_diarias.php">Solicitar</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil Diaria<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro_perfil_de_diaria.php">Cadastrar</a></li>
                  </ul>
                </li>
              </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['servidor']->getNome(); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Meu perfil</a></li>
                            <li><a href="controller/logica_deslogar.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
          </nav>
          
        
        
        <?php
    }
    
    function exibir_navbar_servidor(){
        ?>
          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Sistemas Diarias</a>
              </div>
              <ul class="nav navbar-nav">
                  <li><a href="pagina_principal.php">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Diaria
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Solicitar</a></li>
                    <li><a href="#">Histórico</a></li>
                  </ul>
                </li>
              </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['servidor']['nome']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Meu perfil</a></li>
                            <li><a href="controller/logica_deslogar.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
          </nav>
          
        
        
        <?php
    }
    
}



?>