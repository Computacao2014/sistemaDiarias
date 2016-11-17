<?php

//require_once '../classes/Servidor.php';
require_once 'DAO.php';


class ServidorDAO{
    public static function inserir_servidor($servidor){
        $sql = "INSERT INTO servidor(matricula, cpf, nome, senha) VALUES ('{$servidor->getMatricula()}','{$servidor->getCpf()}','{$servidor->getNome()}','{$servidor->getSenha()}')";

        $dao = new DAO();
        $con = $dao->getConexao();
        mysqli_query($con, $sql);
    }
}
