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
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1 class="text-center">Listar os perfis de diárias</h1>
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <table class="table tabela table-striped table-bordered">
                    <thead>
                        <tr>
                            <td><h5><strong>ID Perfil</strong></h5></td>
                            <td><h4><strong>Nome/Classe</strong></h4></td>
                            <td><h4><strong>Valor No estado</strong></h4></td>
                            <td><h4><strong>Fora do estado</strong></h4></td>
                            <td><h4><strong>Região A</strong></h4></td>
                            <td><h4><strong>Região B</strong></h4></td>
                            <td><h4><strong>Região C</strong></h4></td>
                            <td><h4><strong>Região D</strong></h4></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $perfilDao = new PerfilDiariaDAO();
                        $perfis = $perfilDao->listarTodos();
                        foreach ($perfis as $perfil){
                            echo "<tr>";
                            echo "<td>{$perfil['id_perfil_diaria']}</td>";
                            echo "<td>{$perfil['nome']}</td>";
                            echo "<td>{$perfil['valor_no_estado']}</td>";
                            echo "<td>{$perfil['valor_fora_estado']}</td>";
                            echo "<td>{$perfil['valor_regiao_a']}</td>";
                            echo "<td>{$perfil['valor_regiao_b']}</td>";
                            echo "<td>{$perfil['valor_regiao_c']}</td>";
                            echo "<td>{$perfil['valor_regiao_d']}</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

        <?php
    }
}

$p = new BuscarPerfilDiaria();
$p->set_titulo("Buscar Perfis");
$p->display();
