<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../classes/PerfilDiaria.php';
require_once '../DAO/PerfilDiariaDAO.php';
require_once '../DAO/DAO.php';

if($_POST)
{
    $classe = $_POST['classe'];
    $regiaoA = $_POST['regiaoA'];
    $regiaoB = $_POST['regiaoB'];
    $regiaoC = $_POST['regiaoC'];
    $regiaoD = $_POST['regiaoD'];
    $noEstado = $_POST['regiaoE'];
    $foraEstado = $_POST['regiaoF'];
    $cargo = $_POST['nomeCargo'];
    
    $perfilDiaria = new PerfilDiaria($classe,$noEstado,$foraEstado,$regiaoA,$regiaoB,$regiaoC,$regiaoD);
    $perfilDAO = new PerfilDiariaDAO();
    $perfilDAO->inserir($perfilDiaria);
    
}