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
                <h3 class="titulo">Sistema de Diárias</h3>
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
    </body>
    
</html>
        
  