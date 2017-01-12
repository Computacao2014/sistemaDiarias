<?php
    require_once 'classes/pagina.php';
    require_once 'classes/Cargo.php';
    require_once 'DAO/CargoDAO.php';
    require_once 'DAO/DAO.php';
    
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
        <h3 class="titulo">Cadastrar Perfil de Diaria</h3>
        <?php
        if(filter_has_var(INPUT_GET, 'resultado')){
                $resultado = filter_input(INPUT_GET, 'resultado');
                if($resultado == 'sucesso'){
                    exibir_sucesso();
                }else if($resultado == 'erro')
                {
                    exibir_erro();
                }
            } 
        
        ?>
        
        <div class="container">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 formulario">
                    
                    <form class="form-horizontal table" action = "controller/logica_cadastrar_perfil_diaria.php" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Classe">Classe:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Ex: Classe LD" name="classe"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorA">Valor Região A:</label>
                            <div class="col-sm-10">
                                  <input type="number" min ="0.01" max="9999.99" step="0.01" class="form-control" placeholder="Digite um valor" name="regiaoA"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorB">Valor Região B:</label>
                            <div class="col-sm-10">
                                  <input type="number" min ="0.01" max="9999.99" step="0.01" class="form-control" placeholder="Digite um valor" name="regiaoB"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorC">Valor Região C:</label>
                            <div class="col-sm-10">
                                <input type="number" min ="0.01" max="9999.99" step="0.01" class="form-control" placeholder="Digite um valor" name="regiaoC"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorD">Valor Região D:</label>
                            <div class="col-sm-10">
                                <input type="number" min ="0.01" max="9999.99" step="0.01" class="form-control" placeholder="Digite um valor" name="regiaoD"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorE">Valor no Estado:</label>
                            <div class="col-sm-10">
                                <input type="number" min ="0.01" max="9999.99" step="0.01" class="form-control" placeholder="Digite um valor" name="regiaoE"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorF">Valor fora do Estado:</label>
                            <div class="col-sm-10">
                                <input type="number" min ="0.01" max="9999.99" step="0.01" class="form-control" placeholder="Digite um valor" name="regiaoF"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cargo"> Cargo: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Digite nome do cargo" name="nomeCargo"/>
                            </div>
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-lg btn-primary btn-block botao">Cadastrar</button>
                          </div>
                        </div>
                    </form>
                </div>
        </div>
    <?php
    }
    function listagemCargo1()
    {
        $dao = new DAO();
        $cargoDAO = new CargoDAO($dao->getConexao());
        $cargos = $cargoDAO->listarTodos();
        var_dump($cargos);
        $dao->fecharConexao();
        return $cargos;
    }
}
    $t = new Pagina_Cadastro_Perfil_Diaria();
    
    $t->set_titulo('Cadastro de diarias');
    
    
    $t->display();
    
    function listagemCargo()
    {
        $cargoDAO = new CargoDAO();
        $cargos = $cargoDAO->listarTodos();
        return $cargos;
    }
    function exibir_sucesso(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-success col-sm-10">
                    <strong>O Perfil de Diaria foi cadastrado com sucesso!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function exibir_erro(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-danger col-sm-10">
                    <strong>O Perfil de Diaria não foi cadastrado!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }