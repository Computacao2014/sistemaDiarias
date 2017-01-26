<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/Producoes.php');

class ProducoesDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
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
}