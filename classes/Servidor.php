<?php

require_once 'Cpf.php';

class Servidor {
    private $nome;
    private $cpf;
    private $rg;
    private $data_nascimento;
    private $cargo;
    private $matricula;
    private $chefe;
    private $email;
    private $senha;
    
    
    
    
    
    public function setCargo($cargo){
        $this->cargo = $cargo;
        return TRUE;
    }
    
    public function setChefe($chefe){
        $this->chefe = $chefe;
        return TRUE;
    }
    
    public function setCpf($cpf){
        if(Cpf::cpfValido($cpf)){
            $this->cpf = $cpf;
            return TRUE;
        }
        else{
            return FALSE;
        }
        
    }
    
    public function setDataNascimento($data){
        $this->data_nascimento = $data;
        return TRUE;
    }

        public function setEmail($email){
        $this->email = $email;
        return true;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
        return TRUE;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return true;
    }
    
    public function setRg($rg){
        if(is_numeric($rg)){
            $this->rg = $rg;
            return true;
        }
        else{
            return false;
        }
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
        return true;
    }
    
    
    
}
