<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/DAO/PerfilDiariaDAO.php";

if(isset($_POST['nome_classe'])){
    $nomeClasse = $_POST['nome_classe'];
    $perfilDAO = new PerfilDiariaDAO();
    $perfis = $perfilDAO->buscarPorNome($nomeClasse);
    if($perfis!=false){
        foreach ($perfis as $perfil){
            echo "<tr>";
            echo "<td><input readonly class='form-control id_classe' value='{$perfil['id_perfil_diaria']}'></td>";
            echo "<td>{$perfil['nome']}</td>";
            echo "<td><input class='form-control valor_estado' value='{$perfil['valor_no_estado']}'></td>";
            echo "<td><input class='form-control valor_fora' value='{$perfil['valor_fora_estado']}'></td>";
            echo "<td><input class='form-control valor_a' value='{$perfil['valor_regiao_a']}'></td>";
            echo "<td><input class='form-control valor_b' value='{$perfil['valor_regiao_b']}'></td>";
            echo "<td><input class='form-control valor_c' value='{$perfil['valor_regiao_c']}'></td>";
            echo "<td><input class='form-control valor_d' value='{$perfil['valor_regiao_d']}'></td>";
            echo "<td><input value='Editar' type='button' class='btn btn-default botao_editar'></td>";
            echo "<td><input value='Apagar' type='button' class='btn btn-danger botao_apagar'></td>";
            echo "</tr>";
        }
    }
    
}else{
    echo "Faltando POST";
}