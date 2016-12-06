<?php

/**
 * Description of DAO
 *
 * @author kenad
 */

 class DAO
 {     
     static function getConexao(){
         $con = new mysqli('localhost', 'root', '', 'sistemadiarias');
         $con->set_charset("utf8");
         if(mysqli_connect_errno()){
             echo 'Codigo do erro '. mysqli_connect_errno();
             exit();
         }
         $con->set_charset("utf8");
         
         return $con;
     }
     
 }
