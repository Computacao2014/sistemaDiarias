<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/Evento.php');

class EventoDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    function inserir(Evento $var_evento)
    {
        try {
            $query = "insert into var_evento($nome_evento,$local_evento,$periodo_evento,$abrangencia_evento) values('{$var_evento->getNome_Evento()}','{$var_evento->getLocal_Evento()}','{$var_evento->getPeriodo_Evento()}','{$var_evento->getAbrangencia()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from var_evento where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $var_evento = array();

        while($per = mysqli_fetch_assoc($resultado))
        {
            array_push($var_evento,$var_evento);
        }

        return $var_evento;
    }
   
    function listarTodos()
    {
        $query = "select * from var_evento";

        $resultado = mysqli_query($conexao, $query);

        $cargos = array();

        while($var_banco = mysqli_fetch_assoc($resultado))
        {
            array_push($var_evento,$var_evento);
        }

        return $var_evento;
    }
}
?>