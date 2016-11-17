<?php

/**
 * Description of DAO
 *
 * @author kenad
 */

 class DAO
 {
     private $conexao;

     function __construct()
     {
         $this->conexao = mysqli_connect('localhost', 'root', '', 'sistemasdiarias');
     }

     function getConexao()
     {
         return $this->conexao;
     }
     function fecharConexao()
     {
         mysqli_close($conexao);
     }
 }
