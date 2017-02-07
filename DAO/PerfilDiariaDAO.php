<?php
/**
 * Description of ClasseDAO
 *
 */
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/DAO/DAO.php";
require_once "$root/classes/PerfilDiaria.php";

class PerfilDiariaDAO {
    //put your code here

    function inserir(PerfilDiaria $perfil_diaria)
    {
        
        try {
            $query = "insert into perfil_diaria(nome,valor_no_estado,valor_fora_estado,valor_regiao_a,valor_regiao_b,valor_regiao_c,valor_regiao_d) values('{$perfil_diaria->getNome()}',{$perfil_diaria->getValorNoEstado()},{$perfil_diaria->getValorForaEstado()},{$perfil_diaria->getValorRegiaoA()},{$perfil_diaria->getValorRegiaoB()},{$perfil_diaria->getValorRegiaoC()},{$perfil_diaria->getValorRegiaoD()})";

            mysqli_query(DAO::getConexao(), $query);
           
            return true;
        } catch (Exception $ex) {
           
            //echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from perfil_diaria where id_perfil_diaria=?";

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
    function buscarPorNome($classe)
    {
        $query = "select * from perfil_diaria where nome LIKE '%{$classe}%'";

        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $array = $resultado->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $con->close();
            return $array;
        }else{
            return false;
        }
       
    }
    function listarTodos()
    {
        $query = "select * from perfil_diaria WHERE ?";
        $num = 1;
        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $num);
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $array = $resultado->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $con->close();
            return $array;
        }
        $stmt->close();
        $con->close();
        return false;
    }
    
    public function deletarPerfil($id){
        $query = "DELETE FROM `perfil_diaria` WHERE `id_perfil_diaria`= ?";
        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            $stmt->close();
            $con->close();
            return true;
        }
        $stmt->close();
        $con->close();
        return FALSE;
    }
    
    public function atualizarPerfil(PerfilDiaria $perfil){
        $idPerfil = $perfil->getId();
        $nome = $perfil->getNome();
        $valorEstado = $perfil->getValorNoEstado();
        $valorForaEstado = $perfil->getValorForaEstado();
        $vRegA = $perfil->getValorRegiaoA();
        $vRegB = $perfil->getValorRegiaoB();
        $vRegC = $perfil->getValorRegiaoC();
        $vRegD = $perfil->getValorRegiaoD();
        
        $query = "UPDATE  perfil_diaria  SET  nome = ?, valor_no_estado = ?, valor_fora_estado = ?, valor_regiao_a = ?, valor_regiao_b =?, valor_regiao_c =?, valor_regiao_d = ? WHERE id_perfil_diaria = ?";
        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("sddddddi", $nome, $valorEstado, $valorForaEstado, $vRegA, $vRegB, $vRegC, $vRegD, $idPerfil);
        if($stmt->execute()){
            $stmt->close();
            $con->close();
            return true;
        }
        $stmt->close();
        $con->close();
        return FALSE;
    }
}
?>