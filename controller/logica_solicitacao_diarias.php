<?php
require_once '../classes/Servidor.php';
require_once '../DAO/ServidorDAO.php';
require_once '../DAO/DAO.php';
require_once '../classes/Banco.php';
require_once '../classes/Evento.php';

if($_POST){

        $codigo_agencia = $_POST['codigo_agencia'];
        $codigo_banco = $_POST['codigo_banco'];
        $banco = $_POST['banco'];
        $nome_evento = $_POST['nome_evento'];
        $local_evento = $_POST['local_evento'];
        $periodo_evento = $_POST['periodo_evento'];
        $abrangencia_evento = $_POST['abrangencia_evento'];
        //var_dump($_POST);
        //die();
        $titulo_trabalho = $_POST['titulo_trabalho'];
        $titulo_projeto_cadastrado_prop = $_POST['titulo_projeto_cadastrado_prop'];
        $check_auxilio = $_POST['check_auxilio'];
        $justificativa = $_POST['justificativa'];
        $tipo_auxilio = $_POST['tipo_auxilio'];
        $pontuacao = $_POST['pontuacao'];
        $importancia = $_POST['importancia'];
        
        $dao = new DAO();
        $servidorDAO = new ServidorDAO($dao->getConexao());
        
        $servidor = new Servidor();
        $banco_obj = new conta_bancaria();
        $evento_obj = new Evento();
        
        
        $banco_obj->setBanco($banco);
        $banco_obj->setCodigo_Agencia($codigo_agencia);
        $banco_obj->setCodigo_Banco($codigo_banco);
        $evento_obj->setAbrangencia($abrangencia_evento);
        $evento_obj->setLocal_Evento($local_evento);
        $evento_obj->setNome_Evento($nome_evento);
        $evento_obj->setPeriodo_Evento($periodo_evento);
        
       
        
    }
    
?>
