<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sistemaDiarias";
require_once "$root/classes/pagina.php";
require_once "$root/DAO/PerfilDiariaDAO.php";

class BuscarPerfilDiaria extends Pagina{
    public function exibir_body() {
        parent::exibir_body();
        ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Listar os perfis de diárias</h1>
            <table class="table tabela table-striped table-bordered">
                <thead>
                    <tr>
                        <td><strong>ID Perfil</strong></td>
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
                        echo "<td><input class='form-control valor_estado' value='{$perfil['valor_no_estado']}'></td>";
                        echo "<td><input class='form-control valor_fora' value='{$perfil['valor_fora_estado']}'></td>";
                        echo "<td><input class='form-control valor_a' value='{$perfil['valor_regiao_a']}'></td>";
                        echo "<td><input class='form-control valor_b' value='{$perfil['valor_regiao_b']}'></td>";
                        echo "<td><input class='form-control valor_c' value='{$perfil['valor_regiao_c']}'></td>";
                        echo "<td><input class='form-control valor_d' value='{$perfil['valor_regiao_d']}'></td>";
                        echo "<td><input value='Editar' type='button' class='btn btn-default botao_editar'></td>";
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
        $(".botao_apagar").on("click", function(){
            $.ajax({
                type:"POST",
                url:"controller/logica_deletar_perfil_diaria.php",
                data:{
                    id_perfil: $(this).parent().parent().find(".id_classe").val()
                },
                success: function(resposta){
                    alert(resposta);
                }
            });
            
        });
        
        $(".botao_editar").on("click", function(){
            alert("Botao Editar");
        });
        
    });
</script>
        <?php
    }
    
}

$p = new BuscarPerfilDiaria();
$p->set_titulo("Buscar Perfis");
$p->display();
