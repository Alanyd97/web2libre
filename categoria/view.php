<?php

require_once('libs/Smarty.class.php');

// CLASE PARA LA VIEW DE LA TABLA PRODUCTOS
class CategoriasView {
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }
    public function DisplayCategoria($categoria, $usuario = null, $error = ''){ 
        $this->smarty->display('templates/top.tpl');
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('templates/nav.tpl');
        $this->smarty->assign('titulo',"Mostrar Categoria");
        $this->smarty->assign('lista_categoria',$categoria);
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/categorias.tpl');
    }
}