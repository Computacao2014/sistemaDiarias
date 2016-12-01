<?php

//require_once '../classes/Servidor.php';
require_once 'DAO.php';


class ServidorDAO{
        
    public function inserir_servidor(Servidor $servidor){        
        try{
            $con = $this->conexao;
            $query = "INSERT INTO servidor (matricula, cpf, email, nome, senha, id_cargo) VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($query);
            
            
            $nome = mysqli_real_escape_string($con,$servidor->getNome());
            $cpf = mysqli_real_escape_string($con,$servidor->getCpf());
            $senha = mysqli_real_escape_string($con,$servidor->getSenha());
            $matricula = mysqli_real_escape_string($con,$servidor->getMatricula());
            $email = mysqli_real_escape_string($con,$servidor->getEmail());
            $cargo = mysqli_real_escape_string($con,intval($servidor->getCargo()));
            
            $query = "INSERT INTO servidor (matricula, cpf, email, nome, senha, id_cargo) VALUES ('{$matricula}','{$cpf}','{$email}','{$nome}','{$senha}','{$cargo}')";
            
            /*if ($con->query($query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }*/
                        
            $stmt->bind_param("sssssi",$matricula,$cpf,$email,$nome,$senha,$cargo);
            if(!$stmt->execute()){
                
                return false;            
            }
            $stmt->close();
            return true;
        } catch (Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
            
            
    }
    public function buscarPorMatricula($matricula)
    {
        $query = "SELECT * FROM servidor WHERE matricula = '{$matricula}'";
        $dao = new DAO();
        $conexao = $dao->getConexao();
        
        $resultado = $conexao->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        if(count($arrayServidores)==0){
            $dao->fecharConexao();
            return NULL;
        }
        $dao->fecharConexao();
        return $arrayServidores[0];
    }
    
    public function listarTodos(){
        $query = "SELECT * FROM servidor ORDER BY nome ASC";
        $dao = new DAO();
        $conexao = $dao->getConexao();
        
        $resultado = $conexao->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        if(count($arrayServidores)==0){
            $dao->fecharConexao();
            return NULL;
        }
        
        $dao->fecharConexao();
        return $arrayServidores;
    }
}
