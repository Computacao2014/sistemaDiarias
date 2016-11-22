<?php
    require_once 'classes/pagina.php';
    
    class Pagina_Cadastro_Perfil_Diaria extends Pagina{
        public function exibir_body() {
            parent::exibir_body();
        ?>
            
        <?php
            $this->exibir_cadastro_perfil_diaria();
            //$this->verificacao();
        }
    public function exibir_cadastro_perfil_diaria(){
         ?>
        
        <div class="nav">
        <a href="">sistemaDiarias</a>
    </div>
    <div class="cad">
        <form name="loginform" method="post" action="cad.php">
    </div>
    <div>
            <input type="double" placeholder="ValorNoEstado" name="valornoestado"/>
    </div>
            <input type="double" placeholder="ValorForaEstado" name="valorforaestado" />
    <div>
            <input type="text" placeholder="Classe" name="classe" />
    </div>
    <div>
             <input type="text" placeholder="Cargo" name="cargo" />
    </div>
    <div>
            <input type="submit" value="Cadastrar" />
    </div>
            
        </form>
    </div>
    <?php
    }
    public function verificacao(){
    if(@$_GET['go'] == 'cadastrar'){
    $valorNoEstado = $_POST['valorNoEstado'];
    $valorForaEstado = $_POST['valorForaEstado'];
    $classe = $_POST['classe'];
    
    $perfil = new PerfilDiaria($valorForaEstado, $classe, $valorNoEstado);
    $dao = new DAO();
    $daoPerfin = new PerfilDiariaDAO($dao->getConexao());
    $confirmacao = $daoPerfin->inserir($perfil);
    $carguinho = new Cargo($cargo,mysql_fetch_array($daoPerfin->buscarPorClasse($classe)));
    
    /*if(empty($id)){
        echo "<script>alert('Preencha todos os campos para cadastrar o perfil.'); history.back();</script>";
    }elseif(empty($valorNoEstado)){
        echo "<script>alert('Preencha todos os campos para cadastrar o perfil.'); history.back();</script>";
    }elseif(empty($valorForaEstado)){
        echo "<script>alert('Preencha todos os campos para cadastrar o perfil.'); history.back();</script>";
    }elseif(empty($classe)){
        echo "<script>alert('Preencha todos os campos para cadastrar o perfil.'); history.back();</script>";
    }elseif(empty($cargo)){
        echo "<script>alert('Preencha todos os campos para cadastrar o perfil.'); history.back();</script>";
    }else{
        $query1 = mysql_num_rows(mysql_query("SELECT * FROM ID WHERE ID = '$id'"));*/
        if($confirmacao == TRUE){
            echo "<script>alert('O id de diária já existe.); history.back();</script>";
        }else{
            mysql_query("insert into    perfil_diaria (classe,valorNoEstado,valorForaEstado) values ('$classe','$valorNoEstado','$valorForaEstado')");
            echo "<script>alert('Perfil cadastrado com sucesso.');</script>";
            header("location: CadPerfilDiaria.php");
        }
    }
    }
}
    $t = new Pagina_Cadastro_Perfil_Diaria();
    
    $t->set_titulo('Cadastro de diarias');
    
    
    $t->display();