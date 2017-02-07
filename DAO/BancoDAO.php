 <?php

require_once('DAO.php');
require_once('../classes/conta_bancaria.php');

class BancoDAO {
    //put your code here

    
    function inserir(conta_bancaria $var_banco)
    {
        try {
            $query = "insert into conta_bancaria(agencia,conta,banco) values('{$var_banco->getAgencia()}','{$var_banco->getConta()}','{$var_banco->getBanco()}')";
            $con = DAO::getConexao();
            mysqli_query($con, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($conta)
    {
        $query = "select * from conta_bancaria where conta=?";

        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $conta);
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
        $query = "select * from conta_bancaria WHERE ?";
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
/*
$ban = new BancoDAO();
var_dump($ban->buscarPorId("51382-X"));*/
