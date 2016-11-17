<?php

require_once '../classes/Servidor.php';
require_once 'DAO.php';

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$sql = "INSERT INTO servidor(matricula, cpf, nome, senha) VALUES ('{$matricula}','{$cpf}','{$nome}','{$senha}')";

$dao = new DAO();
$con = $dao->getConexao();
mysqli_query($con, $sql);