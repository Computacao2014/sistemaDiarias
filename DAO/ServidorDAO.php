<?php

//require_once '../classes/Servidor.php';
require_once 'DAO.php';


class ServidorDAO{
    public static function inserir_servidor($servidor){        
        $dao = new DAO();
        $con = $dao->getConexao();
        $query = "INSERT INTO servidor (cpf, nome, senha, matricula) VALUES (?,?,?,?)";
        $stmt = $con->prepare($query);
        
        $nome = $servidor->getNome();
        $cpf = $servidor->getCpf();
        $senha = $servidor->getSenha();
        $matricula = $servidor->getMatricula();
        
        $stmt->bind_param("sssi", $cpf, $nome, $senha, $matricula);
        if(!$stmt->execute()){
            return false;            
        }
        $stmt->close();
        $dao->fecharConexao();
        return true;
    }
}
