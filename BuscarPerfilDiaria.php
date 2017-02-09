<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sistemaDiarias";
require_once "$root/classes/pagina.php";
require_once "$root/DAO/PerfilDiariaDAO.php";

class BuscarPerfilDiaria extends Pagina{
    public function exibir_body() {
        parent::exibir_body();
        ?>
    
    <h3 class = titulo>Buscar Perfis</h3>
    <div class="container">
                
        <div class="col-sm-1"></div>

        <div class="col-sm-10 formulario">
            <form id="formPerquisarClasse">
                <table class="table">
                    <tr>
                        <th>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Procurar classe</label>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <br>
                            <div>
                                <input type="text" class="form-control" id="nome_classe">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div>
                                <input type="button" value="Buscar Classes" class="btn btn-lg btn-primary btn-block botaoBusca" id="botao_pesquisar_classe">
                            </div>
                        </th>
                    </tr>
                </table>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="titulo">Listar os perfis de diárias</h3>
            <table class="table tabela table-striped table-bordered" id="tabelaPerfilDiaria">
                <thead>
                    <tr>
                        <td><strong class="id_classe">ID Perfil</strong></td>
                        <td><strong>Nome/Classe</strong></td>
                        <td><strong>Valor No estado</strong></td>
                        <td><strong>Fora do estado</strong></td>
                        <td><strong>Região A</strong>
                        <td><strong>Região B</strong></td>
                        <td><strong>Região C</strong></td>
                        <td><strong>Região D</strong></td>
                        <td colspan="2"><strong>Ações</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $perfilDao = new PerfilDiariaDAO();
                    $perfis = $perfilDao->listarTodos();
                    foreach ($perfis as $perfil){
                        echo "<tr>";
                        echo "<td><input readonly class='form-control id_classe' value='{$perfil['id_perfil_diaria']}'></td>";
                        echo "<td>{$perfil['nome']}</td>";
                        echo "<td><input readonly class='form-control valor_estado' value='{$perfil['valor_no_estado']}'></td>";
                        echo "<td><input readonly class='form-control valor_fora' value='{$perfil['valor_fora_estado']}'></td>";
                        echo "<td><input readonly class='form-control valor_a' value='{$perfil['valor_regiao_a']}'></td>";
                        echo "<td><input readonly class='form-control valor_b' value='{$perfil['valor_regiao_b']}'></td>";
                        echo "<td><input readonly class='form-control valor_c' value='{$perfil['valor_regiao_c']}'></td>";
                        echo "<td><input readonly class='form-control valor_d' value='{$perfil['valor_regiao_d']}'></td>";
                        echo "<td><input readonly value='Editar' type='button' class='btn btn-warning'></td>";
                        echo "<td><input value='Apagar' type='button' class='btn btn-danger botao_apagar'></td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

        <?php
    }
    
    public function exibir_config() {
        parent::exibir_config();
        ?>
<script type="text/javascript">
    $(document).ready(function(){
        ocultarIdClasse();
        
        $("#tabelaPerfilDiaria").on("click", ".botao_apagar", function(){
            $.ajax({
                type:"POST",
                url:"controller/logica_deletar_perfil_diaria.php",
                data:{
                    id_perfil: $(this).parent().parent().find(".id_classe").val()
                },
                success: function(resposta){
                    alert(resposta);
                    location.reload();
                }
            });
            
        });
        
        
        
        $("#tabelaPerfilDiaria").on("click", ".botao_editar", function(){
            var idClasse = $(this).parent().parent().find(".id_classe").val();
            window.open("EditarPerfilDiaria.php?id_classe="+idClasse);
        });
        
        $("#formPerquisarClasse").on("click", "#botao_pesquisar_classe", function(){
            var nome = $("#nome_classe").val();
            $.ajax({
                type:"POST",
                url:"controller/perfil_diaria/getPerfilByNome.php",
                data:{
                    nome_classe: nome
                },
                success: function(resposta){
                    $("#tabelaPerfilDiaria").find("tbody").empty();
                    $("#tabelaPerfilDiaria").find("tbody").append(resposta);
                    ocultarIdClasse();
                }
            });
        });
        
        function ocultarIdClasse(){
            $(".id_classe").parent().hide();
        }
    });
</script>
        <?php
    }
    
    
}

$p = new BuscarPerfilDiaria();
$p->set_titulo("Buscar Perfis");
$p->display();
