<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/Trabalho.php');

class TrabalhoDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    function inserir(Trabalho $var)
    {
        try {
            $query = "insert into var(titulo,titulo_prop) values('{$var->getTitulo_do_trabalho()}','{$var->getTitulo_do_trabalho_cadastrado_na_prop()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorNome($nome)
    {
        $query = "select * from trabalho where nome = '{$nome}'";

        $resultado = mysqli_query($conexao, $query);

        $trabalhos = array();

        while($trabalho = mysqli_fetch_assoc($resultado))
        {
            array_push($trabalhos,$trabalho);
        }

        return $trabalho;
    }
}