<?php
    require_once "DAO/DAO.php";
    date_default_timezone_set("America/Sao_Paulo");
    mysql_connect('localhost','root','');
    mysql_select_db('sistemaDiarias');
    ini_set('smtp_port','587');
?>
<html>
    <head>
        <title>Sistema Diárias</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    
    <body>
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
                <h1 class="titulo">UESPI - Universidade Estadual do Piauí</h1>
                <h3 class="titulo">Recuperar Senha </h3>
                <div class="row">
                    <div class="col-sm-4 col-xs-1"></div>
                    <div class="col-sm-4 col-xs-10">
                        <div class="formulario">
                            <form autocomplete="off" class="form-signin" action="Envia_email_recuperacao.php" method="post">

                                <strong><h4>Email</h4></strong></br>
                                <input type="email" class="form-control entrada" id="inputEmail" name="acao">
                                
                                <input type="submit" class="btn btn-lg btn-primary btn-block botao" value="Recuperar Senha">
                               
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- /Conteúdo Interno -->
          </div><!-- /Conteúdo -->
          
    </body>
    
</html>
        
  