<?php
/**
 * Description of ClasseDAO
 *
 */
require_once('DAO/DAO.php');
require_once('class/Auxilios.php');

class AuxiliosDAO {
    //put your code here

    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    function inserir(Auxilios $var)
    {
        try {
            $query = "insert into var(auxilio_anterior,anos,tipo_auxilio) values('{$var->getJa_recebeu_auxilio()}','{$var->getQuantidade_de_anos()}','{$var->getTipo_auxilio_solicitado()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorTudo($auxilio_anterior,$anos,$tipo_auxilio,$matricula_servidor)
    {
        $query = "select auxilio_anterior,anos,tipo_auxilio,matricula_servidor from historico_auxilio where auxilio_anterior = {$auxilio_anterior} and anos = '{$anos}' and tipo_auxilio = '{$tipo_auxilio}' and matricula_servidor = '{$matricula_servidor}'";

        $resultado = mysqli_query($conexao, $query);

        $auxilios = array();
        

        while($auxilio = mysqli_fetch_assoc($resultado))
        {
            $auxTemp =  new Auxilios();
            
            $auxTemp->setJa_recebeu_auxilio($auxilio['ja_recebeu_auxilio']);
            $auxTemp->setQuantidade_de_anos($auxilio['quantidade_de_anos']);
            $auxTemp->setTipo_auxilio_solicitado($auxilio['tipo_auxilio_solicitado']);
            $auxTemp->setServidor($auxilio['servidor']);
            
            array_push($auxilios,$auxTemp);
        }

        return $auxilio;
    }
}
