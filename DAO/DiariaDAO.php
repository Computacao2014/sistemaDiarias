<?php

$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias/';
require_once "$root/classes/Diaria.php";
require_once "$root/DAO/DAO.php";

class DiariaDAO {
    
    public function inserir(Diaria $diaria){
        $idViagem = $diaria->getIdViagem();
        $idEvento = $diaria->getIdEvento();
        $idTrabalho = $diaria->getIdTrabalho();
        $idHistorico = $diaria->getIdAuxilio();
        $idProducao = $diaria->getIdProducoes();
        $idPerfil = $diaria->getIdPerfilDiaria();
        $idUsuario = $diaria->getIdServidor();
        
        $query = "INSERT INTO diaria (id_viagem, id_evento, id_trabalho, id_historico, id_producao, id_perfil_diaria, id_usuario) VALUES (?,?,?,?,?,?,?)";
        $con = DAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("iiiiiis", $idViagem, $idEvento, $idTrabalho, $idHistorico, $idProducao, $idPerfil, $idUsuario);
        
        if($stmt->execute()){
            $stmt->close();
            $con->close();
            return true;
        }
        return false;;
    }
    
    public function listarTodos(){        
        $con = DAO::getConexao();
        $query = "select * from diaria";
        $con = DAO::getConexao();
        $stmt = $con->prepare($query);

        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $array = $resultado->fetch_all(MYSQLI_ASSOC);            
            $stmt->close();
            $con->close();
            return $array;
        }
        $stmt->close();
        $con->close();
        return NULL;

    }
}
//$diaria = new Diaria();
//$diaria->setIDServidor("1053253");
//$diaria->setIdAuxilio(1);
//$diaria->setIdEvento(1);
//$diaria->setIdPerfilDiaria(1);
//$diaria->setIdProducoes(1);
//$diaria->setIdTrabalho(1);
//$diaria->setIdViagem(1);
//$diDao = new DiariaDAO();
//$diDao->inserir($diaria);