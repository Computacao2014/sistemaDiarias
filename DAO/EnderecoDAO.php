<?php

/**
 * Description of ClasseDAO
 *
 * @author kenad
 */
require_once('DAO/DAO.php');
require_once('classes/Endereco.php');

class EnderecoDAO
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    function inserir(Endereco $endereco)
    {
        try {
            $query = "insert into endereco(rua,numero,bairro,cidade,cep,estado) values('{$endereco->getRua()}','{$endereco->getNumero()}','{$endereco->getBairro()}','{$endereco->getCidade()}','{$endereco->getCep()}','{$endereco->getEstado()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            
            return false;
        }
    }
    function buscarPorCep($cep)
    {
        $query = "select * from endereco where cep = '{$cep}'";

        $resultado = mysqli_query($conexao, $query);

        $enderecos = array();

        while($endereco = mysqli_fetch_assoc($resultado))
        {
            array_push($enderecos,$endereco);
        }

        return $enderecos;
    }
    function buscarPorRua($rua)
    {
        $query = "select * from endereco where rua = '{$rua}'";

        $resultado = mysqli_query($conexao, $query);

        $enderecos = array();

        while($endereco = mysqli_fetch_assoc($resultado))
        {
            array_push($enderecos,$endereco);
        }

        return $enderecos;
    }
    function buscarEndereco($rua,$cep,$estado)
    {
        $query = "select * from endereco where rua = '{$rua}' and cep = '{$cep}' and estado ='{$estado}'";

        $resultado = mysqli_query($conexao, $query);

        $enderecos = array();

        while($endereco = mysqli_fetch_assoc($resultado))
        {
            array_push($enderecos,$endereco);
        }
        return $enderecos;
    }
    function listarTodos()
    {
        $query = "select * from endereco";

        $resultado = mysqli_query($conexao, $query);

        $enderecos = array();

        while($endereco = mysqli_fetch_assoc($resultado))
        {
            array_push($enderecos,$endereco);
        }

        return $enderecos;
    }
}
