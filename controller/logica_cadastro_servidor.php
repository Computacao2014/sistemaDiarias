<?php
require_once '../classes/Servidor.php';
require_once '../DAO/ServidorDAO.php';
require_once '../DAO/DAO.php';

if($_POST){
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmacao'];
        $cargo = $_POST['cargo'];
        $admin = $_POST['admin'];
        
        $servidorDAO = new ServidorDAO();
        
        $servidor = new Servidor();
        $servidor->setAdmin($admin);
        $servidor->setNome($nome);
        $servidor->setMatricula($matricula);
        $servidor->setCpf($cpf);
        $servidor->setSenha($senha);
        $servidor->setCargo($cargo);
        $servidor->setEmail($email);
        
        if($senha!=$confirmarSenha)
        {
            header("Location: ../cadastro_servidores.php?resultado=erroSenha");
        }else{
            try {
               $resultado = $servidorDAO->inserir_servidor($servidor);       
               if($resultado==TRUE){
                   header("Location: ../cadastro_servidores.php?resultado=sucesso");
               }
               else{
                   header("Location: ../cadastro_servidores.php?resultado=erro");
               }
            } catch (Exception $ex) {
                header("Location: ../cadastro_servidores.php?resultado=erro");
            }
        }
        
    }
    
?>
