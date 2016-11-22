<?php
require_once 'classes/Servidor.php';
require_once 'DAO/ServidorDAO.php';
if($_POST){
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        
        $servidor = new Servidor();
        $servidor->setNome($nome);
        $servidor->setMatricula($matricula);
        $servidor->setCpf($cpf);
        $servidor->setSenha($senha);
        
        if(ServidorDAO::inserir_servidor($servidor)){
            header("Location: cadastro_servidores.php?resultado=sucesso");
        }else{
            header("Location: cadastro_servidores.php?resultado=erro");
        }
        
        
    }
    
?>
