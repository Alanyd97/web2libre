<?php

require_once('./libs/Smarty.class.php');

// CLASE PARA LA VIEW DE LA TABLA PRODUCTOS
class ProductosView {
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
        
      $this->smarty->assign('basehref', BASE_URL);
    }
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayProducto($producto, $categoria, $img = [], $usuario = null){ 
        $this->smarty->display('templates/top.tpl');
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('templates/nav.tpl');
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('lista_productos',$producto);
        $this->smarty->assign('lista_categorias',$categoria);
        $this->smarty->assign('lista_img',$img);
        $this->smarty->display('templates/productos.tpl');
    }
    
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayDetalle($producto, $img = "", $usuario = null){ 
        $this->smarty->display('templates/top.tpl');
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('templates/nav.tpl');
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('producto',$producto);
        $this->smarty->assign('img', $img);
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->display('templates/detalle.tpl');
        
    }
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayEditar($producto,$categoria, $img = "", $usuario){ 
        $this->smarty->display('templates/top.tpl');
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('templates/nav.tpl');
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('producto',$producto);
        $this->smarty->assign('img', $img);
        $this->smarty->assign('lista_categorias',$categoria);
        $this->smarty->display('templates/editar.tpl');
        
    }
    public function DisplaySubirImagen($producto, $img = "", $usuario){ 
        $this->smarty->display('templates/top.tpl');
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('templates/nav.tpl');
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('producto',$producto);
        $this->smarty->assign('imagenes', $img);
        $this->smarty->display('templates/subirImagen.tpl');
        
    }

    
}

?>
