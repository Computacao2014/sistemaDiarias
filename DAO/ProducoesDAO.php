<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO.php');
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Producoes.php";

class ProducoesDAO {

    function inserir(Producoes $var)
    {
        try {
            $query = "insert into var(pontuacao,importancia) values('{$var->getPontuacao()}','{$var->getImportancia()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from producoes_academicas where id_producao=?";

        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $array = $resultado->fetch_assoc();
            $stmt->close();
            $con->close();
            return $array;
        }else{
            return false;
        }
    }
}