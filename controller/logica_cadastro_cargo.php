<?php
require_once '../DAO/DAO.php';
require_once '../DAO/CargoDAO.php';
require_once '../classes/Cargo.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/
    $nome_cargo = $_POST["nomeCargo"];
    $id_perfil_diaria = $_POST["pDiaria"];
    
    $cargo = new Cargo();
    $cargo->setNome($nome_cargo);
    $cargo->setPerfilDiaria(intval($id_perfil_diaria));
    
    try {
        $daoCargo = new CargoDAO();
        $resultado = $daoCargo->inserir($cargo);
        if($resultado==TRUE){
            header("Location: ../cadastro_cargo.php?resultado=sucesso");
        }
        else{
            header("Location: ../cadastro_cargo.php?resultado=erro");
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        header("Location: ../cadastro_cargo.php?resultado=erro");
    }

    