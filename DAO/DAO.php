<?php

/**
 * Description of DAO
 *
 * @author kenad
 */

 class DAO
 {
     private $con;
     
     function getConexao()
     {
         $this->con = mysqli_connect('localhost', 'root', '', 'sistemadiarias');
         mysqli_set_charset($this->con, "utf8");
         
         if(mysqli_connect_errno()){
             echo 'Erro ao connectar com o banco '.  mysqli_error() ;
         }
         
         return $this->con;
     }
     
     function fecharConexao()
     {
         mysqli_close($this->con);
     }
 }
