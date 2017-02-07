<?php

require_once 'classes/Viagem.php';
require_once 'classes/Auxilios.php';
require_once 'classes/Trabalho.php';
require_once 'classes/Producoes.php';
require_once 'classes/Evento.php';

require_once 'ViagemDAO.php';
require_once 'AuxiliosDAO.php';
require_once 'TrabalhoDAO.php';
require_once 'ProducoesDAO.php';
require_once 'EventoDAO.php';

class DiariaDAO {
    public function inserir(Diaria $diaria)
    {
        try{
            $AuxiliosDAO = new AuxiliosDAO($this->conexao);
            $AuxiliosDAO->inserir($diaria->getAuxilio());
            $auxilio = $AuxiliosDAO->buscarPorTudo($diaria->getAuxilio()->getJa_recebeu_auxilio(), $diaria->getAuxilio()->getQuantidade_de_anos(), $diaria->getAuxilio()->getTipo_auxilio_solicitado(), $diaria->getAuxilio()->getServidor());
            $diaria->setAuxilio($auxilio);

            $ViagemDAO = new ViagemDAO($this->conexao);
            $ViagemDAO->inserir($diaria->getViagem());
            $viagem = $ViagemDAO->buscarPorId($diaria->getViagem()->getId());
            $diaria->setViagem($viagem);

            $TrabalhoDAO = new TrabalhoDAO($this->conexao);
            $TrabalhoDAO->inserir($diaria->getTrabalho());
            $trabalho = $TrabalhoDAO->buscarPorNome($diaria->getTrabalho()->getTitulo_do_trabalho_cadastrado_na_prop());
            $diaria->setTrabalho($trabalho);
            
            $ProducoesDAO = new ProducoesDAO($this->conexao);
            $ProducoesDAO->inserir($diaria->getProducoes());
            $producoes = $ProducoesDAO->buscarPorId($diaria->getProducoes()->getServidor());
            $diaria->setProducoes($producoes);
            
            $EventoDAO = new EventoDAO($this->conexao);
            $EventoDAO->inserir($diaria->getEvento());
            $evento = $EventoDAO->buscarPorId($diaria->getEvento()->getServidor());
            $diaria->setEvento($evento);

            $query = "insert into diaria(id_viagem,id_evento,id_trabalho,id_historico,id_producao,id_perfil_diaria,id_usuario) values ({$diaria->getViagem()->getId()},{$diaria->getEvento()->getId()},{$diaria->getTrabalho()->getId()},{$diaria->getAuxilio()->getId()},{$diaria->getProducoes()->getId()},{$diaria->getServidor()->getCargo()->getPerfilDiaria()->getId()},{$diaria->getServidor()->getId()})";

            mysqli_query($conexao, $query);
        
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
