<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../classes/PerfilDiaria.php';
require_once '../DAO/PerfilDiariaDAO.php';
require_once '../DAO/DAO.php';
require_once '../DAO/CargoDAO.php';
require_once '../classes/Cargo.php';


if($_POST)
{
    $classe = $_POST['classe'];
    $regiaoA = $_POST['regiaoA'];
    $regiaoB = $_POST['regiaoB'];
    $regiaoC = $_POST['regiaoC'];
    $regiaoD = $_POST['regiaoD'];
    $noEstado = $_POST['regiaoE'];
    $foraEstado = $_POST['regiaoF'];
    
    try {
              
    $perfilDiaria = new PerfilDiaria();
    $perfilDiaria->setNome($classe);
    $perfilDiaria->setValorRegiaoA($regiaoA);
    $perfilDiaria->setValorRegiaoB($regiaoB);
    $perfilDiaria->setValorRegiaoC($regiaoC);
    $perfilDiaria->setValorRegiaoD($regiaoD);
    $perfilDiaria->setValorNoEstado($noEstado);
    $perfilDiaria->setValorForaEstado($foraEstado);
    
    $perfilDAO = new PerfilDiariaDAO();
    $resultado = $perfilDAO->inserir($perfilDiaria);
    
               if($resultado==TRUE){
                   header("Location: ../cadastro_perfil_de_diaria.php?resultado=sucesso");
               }
               else{
                   header("Location: ../cadastro_perfil_de_diaria.php?resultado=erro");
               }
            } catch (Exception $ex) {
                
                header("Location: ../cadastro_perfil_de_diaria.php?resultado=erro");
            }
    
}