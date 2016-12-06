<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../classes/Servidor.php';
require_once '../DAO/ServidorDAO.php';
require_once '../DAO/DAO.php';

if($_POST){
    $matricula = $_POST['matricula'];
    $servidorDAO = new ServidorDAO();

    if($servidorDAO->deletarServidor($matricula))
    {
        header("Location: ../buscar_servidores.php?resultado=true");
    }  else {
        header("Location: ../buscar_servidores.php?resultado=false");
    }
}
