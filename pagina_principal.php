<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'classes/pagina.php';
class PaginaPrincipal extends Pagina
{
    function __construct($usuario) {
        parent::__construct($usuario);
    }
}
$pag = new PaginaPrincipal(NULL);
$pag->display();
