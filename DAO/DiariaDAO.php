<?php

require_once 'classes/Viagem.php';
require_once 'classes/Auxilios.php';
require_once 'classes/Trabalho.php';
require_once 'classes/Producoes.php';
require_once 'classes/Evento.php';

class DiariaDAO {
    public function inserir(Diaria $diaria)
    {
        try{
            $AuxiliosDAO = new AuxiliosDAO($this->conexao);
            $AuxiliosDAO->inserir($diaria->getAuxilio());
            $diaria->setAuxilio($AuxiliosDAO->buscarPorTudo($diaria->getAuxilio()->getJa_recebeu_auxilio(), $diaria->getAuxilio()->getQuantidade_de_anos(), $diaria->getAuxilio()->getTipo_auxilio_solicitado(), $diaria->getAuxilio()->getServidor());

            $ViagemDAO = new ViagemDAO($this->conexao);
            $ViagemDAO->inserir($diaria->getViagem());
            $diaria->setViagem($ViagemDAO->buscarPorId($diaria->getId()));

            $TrabalhoDAO = new TrabalhoDAO($this->conexao);
            $TrabalhoDAO->inserir($diaria->getTrabalho());
            $diaria->setTrabalho($TrabalhoDAO->buscarPorNome($diaria->get()));
            
            $ProducoesDAO = new ProducoesDAO($this->conexao);
            $ProducoesDAO->inserir($diaria->getProducoes());
            $diaria->setProducoes($ProducoesDAO->buscarPor???($diaria->get()));
            
            $EventoDAO = new EventoDAO($this->conexao);
            $EventoDAO->inserir($diaria->getEvento());
            $diaria->setEvento($EventoDAO->buscarPor???($diaria->get()));

            $query = "insert into diaria_viagem(quant_dias,objeto_viagem,data_inicial,data_final,relato,id_projeto,id_trajeto,id_modalidade,id_servidor) values('{$diaria->getQuantidadeDiarias()}','{$diaria->getObjetivo()}','{}')";

            mysqli_query($conexao, $query);
        
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
