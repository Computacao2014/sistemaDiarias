<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiariaDAO
 *
 * @author root
 */
require_once 'classes/Projeto.php';
require_once 'classes/Trajeto.php';
require_once 'classes/Relatorio.php';
require_once 'classes/ModalidadeTransporte.php';
require_once 'classes/Servidor.php';

class DiariaDAO {
     private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
}
