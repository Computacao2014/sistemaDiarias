<?php
/*    require_once "DAO/DAO.php";
    require_once "Envia_email_recuperacao.php";
    
    echo '....';

    if(isset($_GET['codigo'])){
        try{
        $codigo = $_GET['codigo'];
	$email_codigo = base64_decode($codigo);
        }catch (Exception $exc) {
        echo 'nao ta dando certo';
        }
	$selecionar = mysql_query("SELECT * FROM `codigos` WHERE `codigo` = '$codigo' AND `data` > NOW()");
	if(count($selecionar) >= 1){
		if (isset($_POST['acao']) && $_POST['acao'] == 'mudar'){
			$nova_senha = $_POST['novasenha'];
			$atualizar = mysql_query("UPDATE 'usuarios' SET 'senha' = '$nova_senha' WHERE 'email' = '$email_codigo'");
			if(atualizar){
				$mudar = mysql_query("DELETE FROM 'codigos' WHERE codigo = '$codigo'");
				echo 'A senha foi modificada com sucesso!';
			}
		}
?>

<h1>Digite a nova senha</h1>
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="novasenha" value=""/>
<input type="hidden" name="acao" value="mudar"/>

<?php
	}else{
		echo '<h1><Desculpe mas este link já expirou!</h1>';
	}
}
*/    
?>
