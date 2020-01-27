<?php

require_once "./usuario/view.php";
require_once "./usuario/model.php";
require_once "./login/controller.php";

class UsuarioController extends Seguridad{
  private $view;
  private $model;
  private $login_controller;

  function __construct(){
    $this->view = new UsuarioView();
    $this->model = new UsuarioModel();
    $this->login_controller = new LoginController();

  }
  
                                                   // FUNCIONES DE REGISTRO
  
  // MUESTRA LA PAGINA DE REGISTRO
  function DisplayRegistro(){
    $this->view->DisplayRegistro();
  }

  // INSERTA UN NUEVO USUARIO EN LA BD
  function InsertarUsuario(){
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $this->model->InsertarUsuario($nombre, $hash, 1);
    //$this->view->DisplayMensaje();
    $dbUser = $this->model->GetUsuario($nombre);
    session_start();
    $_SESSION['user'] =  $dbUser->nombre;
    $_SESSION['id_usuario'] =  $dbUser->id_usuario;
    $_SESSION['admin'] = $dbUser->admin;
    header(PRODUCTOS);
  }

  public function GetUsuarios(){
    session_start();
    if (isset($_SESSION['id_usuario'])){
      session_abort();
      $usuario = $this->model->GetUsuarioID($_SESSION['id_usuario']);
    }else{
        $usuario = null;
    }
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
      session_abort();
        $usuarios = $this->model->GetUsuarios();
        $this->view->DisplayUsuarios($usuarios, '', $usuario);
    }else{
        header(LOGIN);
        
    }
   
  }
  public function TogglePermiso($id){
    session_start();
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
      session_abort();
      if ($id[1] == 0){
        $this->model->TogglePermiso(1,$id[0]);
      }
      else{
        $this->model->TogglePermiso(0,$id[0]);
      }
      header(USUARIOS);
    }else{
      header(PRODUCTOS);
    }
  }
  public function BorrarUsuario($id){
    session_start();
    if ($_SESSION['admin'] == 0) {
        session_abort();
        $this->model->BorrarUsuario($id[0]);
        header(USUARIOS);
    }
}


}
