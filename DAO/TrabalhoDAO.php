<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO.php');
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Trabalho.php";

class TrabalhoDAO {

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