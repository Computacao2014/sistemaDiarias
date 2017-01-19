<?php
    date_default_timezone_set("America/Sao_Paulo");
    require_once "DAO/DAO.php";

if (filter_has_var(INPUT_POST, 'acao')){
    $email = strip_tags(filter_input(INPUT_POST,'acao',FILTER_SANITIZE_STRING));
    $verificar = mysql_query("SELECT `email` FROM `servidor` WHERE email = '$email'");
    if(count($verificar) ==1){
        confere_email($email);
    }
   
}
function confere_email($email){
    $codigo = base64_encode($email);
    $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
    $mensagem = '<p>Recebemos uma tentativa de recuperação de senha para este e-mail, caso nao tenha sido voce, desconsidere. Caso contrario clique no link a seguir<br /> <a href="/opt/lampp/htdocs/sistemaDiarias/controller/logica_recuperacao_senha.php?codigo='.$codigo.'">Recuperar Senha</a></p>';
    $email_remetente = 'm47sportes.com';
try {
    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $email_remetente\n";
    $headers .= "Return-Path: $email_remetente\n";
    $headers .= "Reply-to: $email\n";
    
    
        $con = DAO::getConexao();        
        $query = "INSERT INTO codigos (codigo, data) VALUES (?,?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss",$codigo,$data_expirar);
            if(!$stmt->execute()){
                echo 'deu errado';
            }else{
                envia_email($email, $mensagem, $headers, $email_remetente);
            $stmt->close();
            $con->close();
            }
        //die();
    } catch (Exception $exc) {
        echo 'nao ta dando certo';
    }
}
function envia_email($email,$mensagem,$headers,$email_remetente){
    if(mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")){
        echo 'Enviamos um e-mail de recuperação de senha, favor acessar sua caixa de entrada';
    }else{
        echo 'Nao temos domínio válido';
    }
}