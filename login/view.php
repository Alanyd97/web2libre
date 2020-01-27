<?php
class LoginView{
  private $smarty;
  function __construct(){
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
  }
  
  public function DisplayLogin( $estado = ""){
    $this->smarty->assign('titulo',"Login");
    $this->smarty->assign('estado',$estado);
    $this->smarty->display('templates/login.tpl');
  }
  public function DisplayCambioClave( $estado = "", $usuario = null){ 
    $this->smarty->display('templates/top.tpl');
    $this->smarty->assign('usuario',$usuario);
    $this->smarty->display('templates/nav.tpl');
    $this->smarty->assign('titulo',"CambioClave");
    $this->smarty->assign('estado',$estado);
    $this->smarty->display('templates/cambio_clave.tpl');
  }
}

 ?>