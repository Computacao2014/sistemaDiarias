<?php

//require_once '../classes/Servidor.php';
require_once 'DAO.php';


class ServidorDAO{
    
    private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    
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

        $resultado = mysqli_query($this->conexao, $query);

        $servidores = array();

        while($servidor = mysqli_fetch_assoc($resultado))
        {
            array_push($servidores,$servidor);
        }

        return $servidores;
    }
}
