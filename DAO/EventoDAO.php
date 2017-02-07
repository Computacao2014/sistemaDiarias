<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO.php');
require_once('../class/Evento.php');

class EventoDAO {

    function inserir(Evento $var_evento)
    {
        try {
            $query = "insert into evento(nome,local,data_inicial,data_final,abrangencia) values('{$var_evento->getNome_Evento()}','{$var_evento->getLocal_Evento()}','{$var_evento->getPeriodo_Evento()}','{$var_evento->getAbrangencia()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from evento where id_evento=?";

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
   
    function listarTodos()
    {
        $query = "select * from evento WHERE ?";
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
}
?>