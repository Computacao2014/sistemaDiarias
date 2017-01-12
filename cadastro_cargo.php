<?php
    require_once 'classes/pagina.php';
    require_once 'classes/Cargo.php';
    require_once 'DAO/CargoDAO.php';
    require_once 'DAO/PerfilDiariaDAO.php';
    require_once 'DAO/DAO.php';
    
    class Pagina_Cadastro_Cargo extends Pagina{
        public function exibir_body() {
            parent::exibir_body();
        ?>
            
        <?php
            $this->exibir_cadastro_cargo();
            //$this->verificacao();
        }
    public function exibir_cadastro_cargo(){
        ?>
        <h3 class="titulo">Cadastro de Cargo</h3>
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
                    
                    <form class="form-horizontal table" action = "controller/logica_cadastro_cargo.php" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nomeCargo">Nome do cargo:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Ex: SECRETÁRIO(A)" name="nomeCargo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pDiaria"> Perfil de Diaria: </label>
                            <div class="col-sm-10">
                                
                                <select id="cargoSelecionado" name="pDiaria" class="selectpicker form-control">
                                    <?php
                                        $pDiarias = listagemPerfil();
                                        foreach($pDiarias as $pDiaria) : ?>
                                            <option value="<?=$pDiaria['id_perfil_diaria']?>"><?=$pDiaria['nome']?></option>
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
}
    $t = new Pagina_Cadastro_Cargo();
    
    $t->set_titulo('Cadastro de Cargos');
    
    
    $t->display();
    
    function listagemPerfil()
    {
        $pDiariaDAO = new PerfilDiariaDAO();
        $pDiarias = $pDiariaDAO->listarTodos();
      
        return $pDiarias;
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