<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>

    <head>
        <title>Sistema de Login</title>
    </head>
    
    <body>
        <form name="loginform" method="post" action="userauthentication.php">
            Matricula: <input type="text" name="matricula" /><br /><br />
            Senha: <input type="password" name="senha" /><br /><br /> 
            <input type="submit" value="Entrar" />
        </form>
    </body>
</html>