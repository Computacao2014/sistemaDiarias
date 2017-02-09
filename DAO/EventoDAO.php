<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO.php');
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Evento.php";
require_once "$root/classes/Periodo.php";

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
            
            $evento = new Evento();
            $evento->setId($array['id_evento']);
            $evento->setNome_Evento($array['nome']);
            
            $periodo_evento = new Periodo();
            $periodo_evento->setInicio($array['data_inicial']);
            $periodo_evento->setFim($array['data_final']);
            $evento->setPeriodo_Evento($periodo_evento);
            
            $evento->setAbrangencia($array['abrangencia']);
            
            $stmt->close();
            $con->close();
            return $evento;
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