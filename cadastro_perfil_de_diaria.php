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
        <div class="container">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 formulario">
                    
                    <form class="form-horizontal table">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorNoEstado">Valor no Estado:</label>
                            <div class="col-sm-10">
                                  <input type="double" class="form-control" placeholder="Digite um valor" name="valornoestado"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorForaEstado">Fora do Estado:</label>
                            <div class="col-sm-10">
                                  <input type="double" class="form-control" placeholder="Digite um valor" name="valorforaestado"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cargo"> Cargo: </label>
                            <div class="col-sm-10">
                                
                                <select id="cargoSelecionado" name="cargo" class="selectpicker form-control">
                                    <?php
                                        $cargos = $this->listagemCargo1();
                                        foreach($cargos as $cargo) : ?>
                                            <option value="<?=$cargo['id']?>"><?=$cargo['nome']?></option>
                                        <?php endforeach; ?>
                                </select>
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