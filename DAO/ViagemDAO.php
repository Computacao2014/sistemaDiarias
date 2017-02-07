<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/Viagem.php');

class ViagemDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
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
        $query = "select * from viagem where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $result = array();

        while($result = mysqli_fetch_assoc($resultado))
        {
            array_push($results,$result);
        }

        return $result;
    }
}