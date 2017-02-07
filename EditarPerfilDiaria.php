<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sistemaDiarias";
require_once "$root/classes/pagina.php";
require_once "$root/DAO/PerfilDiariaDAO.php";

class EditarPerfilDiaria extends Pagina{
    public function exibir_body() {
        parent::exibir_body();
        $perfilDao = new PerfilDiariaDAO();
        if(isset($_GET['id_classe'])){
            $perfil = $perfilDao->buscarPorId($_GET['id_classe']);
        }else{
            die("Sem Get");
        }
        
        ?>
<div class="container">
    
    <form class="formulario" id="formPerquisarClasse">
            <div class="row">
                <h2>Editar Perfis</h2>
                <div class="col-sm-6">
                    <label>ID Classe</label>
                    <input readonly type="text" class="form-control" id="id_classe"  <?php echo "value='{$perfil['id_perfil_diaria']}'"; ?>>
                </div>
                
                <div class="col-sm-6">
                    <label>Nome Classe</label>
                    <input type="text" class="form-control" id="nome_classe" <?php echo "value='{$perfil['nome']}'"; ?> >
                </div>
                
            </div>
        
            <div class="row">
                <div class="col-sm-6">
                    <label>Valor no estado</label>
                    <input type="text" class="form-control" id="valor_estado"  <?php echo "value='{$perfil['valor_no_estado']}'"; ?>>
                </div>
                
                <div class="col-sm-6">
                    <label>Valor Fora do estado</label>
                    <input type="text" class="form-control" id="valor_fora" <?php echo "value='{$perfil['valor_fora_estado']}'"; ?> >
                </div>
                
            </div>
        
            <div class="row">
                <div class="col-sm-6">
                    <label>Região A</label>
                    <input type="text" class="form-control" id="regiao_a"  <?php echo "value='{$perfil['valor_regiao_a']}'"; ?>>
                </div>
                
                <div class="col-sm-6">
                    <label>Região B</label>
                    <input type="text" class="form-control" id="regiao_b" <?php echo "value='{$perfil['valor_regiao_b']}'"; ?> >
                </div>
                
            </div>
        
            <div class="row">
                <div class="col-sm-6">
                    <label>Região C</label>
                    <input type="text" class="form-control" id="regiao_c"  <?php echo "value='{$perfil['valor_regiao_c']}'"; ?>>
                </div>
                
                <div class="col-sm-6">
                    <label>Região D</label>
                    <input type="text" class="form-control" id="regiao_d" <?php echo "value='{$perfil['valor_regiao_d']}'"; ?> >
                </div>
                
            </div>
        <br>
            <div class="row">
                
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <input type="button" class="btn btn-success btn-block" id="botao_atualizar" value="Atualizar" >
                </div>
                
                <div class="col-sm-3"></div>
            </div>
        </form>
    
</div>

        <?php
    }
    
    public function exibir_config() {
        parent::exibir_config();
        ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#botao_atualizar").click(function(){
            var idClasse = $("#id_classe").val();
            var nome = $("#nome_classe").val();
            var vEstado = $("#valor_estado").val();
            var vFora = $("#valor_fora").val();
            var regA = $("#regiao_a").val();
            var regB = $("#regiao_b").val();
            var regC = $("#regiao_c").val();
            var regD = $("#regiao_d").val();
            $.ajax({
                type:"POST",
                url:"/sistemaDiarias/controller/perfil_diaria/atualiza_perfil.php",
                data:{
                    id_classe:idClasse,
                    nome:nome,
                    v_estado:vEstado,
                    v_fora:vFora,
                    reg_a:regA,
                    reg_b:regB,
                    reg_c:regC,
                    reg_d:regD
                },
                success: function(resposta){
                    alert(resposta);
                }
                
            });
            
        });
    });
    
</script>

        <?php
    }
}

$p = new EditarPerfilDiaria();
$p->set_titulo("Editar Perfis");
$p->display();
