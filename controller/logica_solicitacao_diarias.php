<?php
require_once '../classes/Servidor.php';
require_once '../DAO/ServidorDAO.php';
require_once '../DAO/DAO.php';
require_once '../classes/conta_bancaria.php';
require_once '../classes/Evento.php';

if($_POST){

        $nome_evento = $_POST['nome_evento'];
        $local_evento = $_POST['local_evento'];
        $abrangencia_evento = $_POST['abrangencia_evento'];
        //var_dump($_POST);
        //die();
        $titulo_trabalho = $_POST['titulo_trabalho'];
        $titulo_projeto_cadastrado_prop = $_POST['titulo_projeto_cadastrado_prop'];
        $check_auxilio = $_POST['check_auxilio'];
        $justificativa = $_POST['justificativa'];
        $tipo_auxilio = $_POST['tipo_auxilio'];
        $pontuacao = $_POST['pontuacao'];
        $importancia = $_POST['importancia'];
        
        $dao = new DAO();
        $servidorDAO = new ServidorDAO($dao->getConexao());
        
        $servidor = new Servidor();
        $evento_obj = new Evento();
        
        
        $evento_obj->setAbrangencia($abrangencia_evento);
        $evento_obj->setLocal_Evento($local_evento);
        $evento_obj->setNome_Evento($nome_evento);
        
        recupera_upload();
        
    }
    function recupera_upload(){
        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = 'uploads/';
        // Tamanho máximo do arquivo (em Bytes)
        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
        // Array com as extensões permitidas
        $_UP['extensoes'] = array('pdf', 'doc', 'txt');
        // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
        $_UP['renomeia'] = false;
        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($_FILES['arquivo']['error'] != 0) {
          die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
          exit; // Para a execução do script
        }
        // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
        // Faz a verificação da extensão do arquivo
        $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
        if (array_search($extensao, $_UP['extensoes']) === false) {
          echo "Por favor, envie arquivos com as seguintes extensões: pdf, doc ou txt";
          exit;
        }
        // Faz a verificação do tamanho do arquivo
        if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
          echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
          exit;
        }
        // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
        // Primeiro verifica se deve trocar o nome do arquivo
        if ($_UP['renomeia'] == true) {
          // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
          $nome_final = md5(time()).'.'.$extensao;
        } else {
          // Mantém o nome original do arquivo
          $nome_final = $_FILES['arquivo']['name'];
        }

        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
          // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
          echo "Upload efetuado com sucesso!";
          echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
        } else {
          // Não foi possível fazer o upload, provavelmente a pasta está incorreta
          echo "Não foi possível enviar o arquivo, tente novamente";
        }
    }
    /*
    if(isset($_FILES['arquivo'])){
      $errors= array();
      $file_name = $_FILES['arquivo']['name'];
      $file_size =$_FILES['arquivo']['size'];
      $file_tmp =$_FILES['arquivo']['tmp_name'];
      $file_type=$_FILES['arquivo']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['arquivo']['name'])));
      
      $expensions= array("pdf","doc","txt");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PFD, DOC or TXT file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
    */
?>
