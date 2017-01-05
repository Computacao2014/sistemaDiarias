<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/Banco.php');

class BancoDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    function inserir(Banco $var_banco)
    {
        try {
            $query = "insert into var_banco(codigo_agencia,codigo_banco,banco) values('{$var_banco->getCodigo_Agencia()}','{$var_banco->getCodigo_Banco()}','{$var_banco->getBanco()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
        $query = "select * from var_banco where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $var_banco = array();

        while($per = mysqli_fetch_assoc($resultado))
        {
            array_push($var_banco,$var_banco);
        }

        return $var_banco;
    }
   
    function listarTodos()
    {
        $query = "select * from var_banco";

        $resultado = mysqli_query($conexao, $query);

        $cargos = array();

        while($var_banco = mysqli_fetch_assoc($resultado))
        {
            array_push($var_banco,$var_banco);
        }

        return $var_banco;
    }
}
?>