<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sistemaDiarias";
require_once "$root/DAO/PerfilDiariaDAO.php";

$idPerfil = $_POST['id_perfil'];
$perfilDAO = new PerfilDiariaDAO();
$result = $perfilDAO->deletarPerfil($idPerfil);
if($result==TRUE){
    echo "Apagado com sucesso!";
}else{
    echo "Erro $result[0]: $result[1]";
}