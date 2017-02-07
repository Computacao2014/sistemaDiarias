<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sistemaDiarias";
require_once "$root/DAO/PerfilDiariaDAO.php";
require_once "$root/classes/PerfilDiaria.php";

if(isset($_POST['id_classe'])){
}else{
    die ('Faltando id_classe');
}

if(isset($_POST['nome'])){
}else{
    die ('Faltando nome');
}

if(isset($_POST['v_estado'])){
}else{
    die ('Faltando v_estado');
}

if(isset($_POST['v_fora'])){
}else{
    die ('Faltando v_fora');
}

if(isset($_POST['reg_a'])){
}else{
    die ('Faltando reg_a');
}

if(isset($_POST['reg_b'])){
}else{
    die ('Faltando reg_b');
}

if(isset($_POST['reg_c'])){
}else{
    die ('Faltando reg_c');
}

if(isset($_POST['reg_d'])){
}else{
    die ('Faltando reg_d');
}
$perfil = new PerfilDiaria();
$perfil->setId($_POST['id_classe']);
$perfil->setNome($_POST['nome']);
$perfil->setValorForaEstado($_POST['v_estado']);
$perfil->setValorNoEstado($_POST['v_fora']);
$perfil->setValorRegiaoA($_POST['reg_a']);
$perfil->setValorRegiaoB($_POST['reg_b']);
$perfil->setValorRegiaoC($_POST['reg_c']);
$perfil->setValorRegiaoD($_POST['reg_d']);
$perfilDao = new PerfilDiariaDAO();
$resultado = $perfilDao->atualizarPerfil($perfil);
if($resultado){
    echo "Perfil atualizado";
}else{
    echo "Erro!";
}