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
        $query = "select * from perfil_diaria where id = '{$id}'";

        $resultado = mysqli_query(DAO::getConexao(), $query);

        $perfil_diaria = array();

        while($per = mysqli_fetch_assoc($resultado))
        {
            array_push($perfil_diaria,$perfil_diaria);
        }

        return $perfil_diaria;
    }
    function buscarPorNome($classe)
    {
        $query = "select * from perfil_diaria where nome = '{$classe}'";

        $resultado = mysqli_query(DAO::getConexao(), $query);

        $perfis_diarias = $resultado->fetch_all(MYSQLI_ASSOC);
        
        $perfil_diaria = new PerfilDiaria();
        
        if(count($perfis_diarias)==0){
            return NULL;
        }else{
            $perfil_diaria->setId($perfis_diarias[0]['id_perfil_diaria']);
            $perfil_diaria->setNome($perfis_diarias[0]['nome']);
            $perfil_diaria->setValorForaEstado($perfis_diarias[0]['valor_fora_estado']);
            $perfil_diaria->setValorNoEstado($perfis_diarias[0]['valor_no_estado']);
            $perfil_diaria->setValorRegiaoA($perfis_diarias[0]['valor_regiao_a']);
            $perfil_diaria->setValorRegiaoB($perfis_diarias[0]['valor_regiao_b']);
            $perfil_diaria->setValorRegiaoC($perfis_diarias[0]['valor_regiao_c']);
            $perfil_diaria->setValorRegiaoD($perfis_diarias[0]['valor_regiao_d']);
            
             return $perfil_diaria;
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
            return $true;
        }
        $stmt->close();
        $con->close();
        return FALSE;
    }
}
?>