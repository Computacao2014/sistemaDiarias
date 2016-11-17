<?php
    require_once ('classes/pagina.php');
    
    //Extende da classe Pagina
    class Pagina_Principal extends Pagina{
        public function exibir_body() {
            parent::exibir_body();//Metodo da classe PAI
            
            ?>
                <h1>Pagina principal</h1>
                <p>Aqui estou reescrevendo o o metodo exibir_body() da classe Pagina</p>
                <p>Basta extender essa classe e pronto</p>
            
            <?php
        }
        
    }
    
    $t = new Pagina_Principal();
    $t->set_titulo('Pagina inicial');
    
    
    $t->display();
    
?>