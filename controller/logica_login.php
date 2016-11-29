<?php

require_once "../DAO/DAO.php";
require_once "../DAO/ServidorDAO.php";
require_once "../classes/Servidor.php";

function logar($matricula, $senha){
    session_start();
    echo $matricula;
    echo $senha;
    $dao = new DAO();
    $servidorDAO = new ServidorDAO($dao->getConexao());
    $servidores = $servidorDAO->buscarPorMatricula($matricula);

    if(count($servidores)==1){
        $servidor =  $servidores[0];
        if($servidor['senha'] == $senha){
            $_SESSION['servidor'] = $servidor;
            header("Location: ../pagina_principal.php");
        }else{
            header("Location: ../index.php?resultado=erro");
        }
    }else{
        header("Location: ../index.php?resultado=erro");
    }
} 

if (filter_has_var(INPUT_POST, 'matricula') && filter_has_var(INPUT_POST, 'senha') ){
    if(filter_input(INPUT_POST, 'matricula', FILTER_VALIDATE_INT)){
        $matricula = filter_input(INPUT_POST, 'matricula');
        $senha = filter_input(INPUT_POST, 'senha');
        logar($matricula, $senha);
    }
}
