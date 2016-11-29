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
        
        $dao = new DAO();
        $servidorDAO = new ServidorDAO($dao->getConexao());
        
        $servidor = new Servidor();
        $servidor->setNome($nome);
        $servidor->setMatricula($matricula);
        $servidor->setCpf($cpf);
        $servidor->setSenha($senha);
        $servidor->setCargo($cargo);
        $servidor->setEmail($email);
        
        if($senha!=$confirmarSenha)
        {
            header("Location: ../cadastro_servidores.php?resultado=erroSenha");
            $dao->fecharConexao();
        }else{
            try {
               $servidorDAO->inserir_servidor($servidor);
               header("Location: ../cadastro_servidores.php?resultado=sucesso");
               $dao->fecharConexao();
            } catch (Exception $ex) {
                header("Location: ../cadastro_servidores.php?resultado=erro");
                $dao->fecharConexao();
            }
        }
        
    }
    
?>
