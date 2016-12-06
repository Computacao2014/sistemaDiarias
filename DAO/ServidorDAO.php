<?php

//require_once '../classes/Servidor.php';
require_once 'DAO.php';


class ServidorDAO{
        
    public function inserir_servidor(Servidor $servidor){        
        try{
            $con = DAO::getConexao();
            $query = "INSERT INTO servidor (matricula, cpf, email, nome, senha, id_cargo, admin) VALUES (?,?,?,?,?,?,?)";
            $stmt = $con->prepare($query);
            
            
            $nome = ($servidor->getNome());
            $cpf = ($servidor->getCpf());
            $senha = ($servidor->getSenha());
            $matricula = ($servidor->getMatricula());
            $email = ($servidor->getEmail());
            $cargo = ($servidor->getCargo());
            $admin = ($servidor->getAdmin());
                                    
            $stmt->bind_param("sssssii",$matricula,$cpf,$email,$nome,$senha,$cargo,$admin);
            if(!$stmt->execute()){
                return false;            
            }
            $stmt->close();
            $con->close();
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
        $con = DAO::getConexao();
        
        $resultado = $con->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        $con->close();
        if(count($arrayServidores)==0){
            return NULL;
        }
        return $arrayServidores[0];
    }
    
    public function buscaPorMatriculaOuNome($matricula,$nome)
    {
        $query = "SELECT * FROM servidor WHERE matricula = '{$matricula}' OR nome LIKE '%{$nome}%' ORDER BY nome ASC";
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
    
    public function deletarServidor($matricula)
    {
        try {
            $query = "DELETE FROM servidor WHERE matricula = '{$matricula}'";
            $con = DAO::getConexao();        
            $resultado = $con->query($query);
            $con->close();
            if($resultado==TRUE){
                return TRUE;
            }
            return FALSE;
        } catch (Exception $ex) {
            return FALSE;
        }
        
    }
    
    public function listarTodos(){
        $query = "SELECT * FROM servidor ORDER BY nome ASC";
        $con = DAO::getConexao();
        
        $resultado = $con->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        $con->close();
        if(count($arrayServidores)==0){
            return NULL;
        }
        
        return $arrayServidores;
    }
}
