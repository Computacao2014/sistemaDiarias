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
    $nomeCargo = $_POST['nomeCargo'];
    
    
    try {
              
    $perfilDiaria = new PerfilDiaria();
    $perfilDiaria->setNome($classe);
    $perfilDiaria->setValorRegiaoA($classe);
    $perfilDiaria->setValorRegiaoB($classe);
    $perfilDiaria->setValorRegiaoC($classe);
    $perfilDiaria->setValorRegiaoD($classe);
    $perfilDiaria->setValorNoEstado($classe);
    $perfilDiaria->setValorForaEstado($classe);
    
    $perfilDAO = new PerfilDiariaDAO();
    $perfilDAO->inserir($perfilDiaria);
    $perfilDiaria= $perfilDAO->buscarPorNome($perfilDiaria->getNome());
    $cargo = new Cargo();
    $cargo->setNome($nomeCargo);
    $cargo->setPerfilDiaria($perfilDiaria);
    $cargoDAO = new CargoDAO();
    $resultado=$cargoDAO->inserir($cargo);    
    
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