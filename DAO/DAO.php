<?php

/**
 * Description of DAO
 *
 * @author kenad
 */

 class DAO
 {
     
     function getConexao()
     {
         $con = mysqli_connect('localhost', 'root', '', 'sistemadiarias');
         mysqli_set_charset($con, "utf8");
         
         if(mysqli_connect_errno()){
             echo 'Erro ao connectar com o banco '.  mysqli_error() ;
         }
         
         return $con;
     }
     
     function fecharConexao()
     {
         mysqli_close($conexao);
     }
 }
