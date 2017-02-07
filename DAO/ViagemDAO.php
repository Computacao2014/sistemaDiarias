<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO.php');
require_once('../class/Viagem.php');

class ViagemDAO {

    function inserir(Viagem $var)
    {
        try {
            $query = "insert into var(quantidade_dias,partida,chegada) values('{$var->getQuantidade_de_dias()}','{$var->getData_de_partida()}','{$var->getData_de_chegada()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from viagem where id_viagem=?";

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