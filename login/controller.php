<?php

require_once "view.php";
require_once "./usuario/model.php";

class LoginController{
  private $view;
  private $model;

  function __construct(){
    $this->view = new LoginView();
    $this->model = new UsuarioModel();
    
  }

    // FUNCIONES DE LOGIN

  
  // MUESTRA EL LOGIN
  public function DisplayLogin(){
    $this->view->DisplayLogin();
  }

  // LOGIN 
  public function Login(){
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $dbUser = $this->model->GetUsuario($nombre);
    if (!empty($dbUser)){
      if (password_verify($clave, $dbUser->clave)){
          session_start();
          $_SESSION['user'] =  $dbUser->nombre;
          $_SESSION['id_usuario'] =  $dbUser->id_usuario;
          $_SESSION['admin'] = $dbUser->admin;
          header(PRODUCTOS);
        }else{
          $this->view->DisplayLogin("Clave incorrecta");
        }
    }else{
      $this->view->DisplayLogin("No existe el usuario");
    }
  }
  
  public function CambiarClave(){
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];
    if ($_POST['nombre'] != '' && $_POST['clave'] != '' && $_POST['clave2'] != '' ){
      $dbUser = $this->model->GetUsuario($nombre);
      if (!empty($dbUser)){
          if ($clave == $clave2){
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            if ($dbUser->admin == 0) {
              $this->model->EditarUsuario($nombre,$hash,0,  $dbUser->id_usuario);
            }else {
              $this->model->EditarUsuario($nombre,$hash,1,  $dbUser->id_usuario);
            }
            $this->view->DisplayLogin("Clave cambiada con exito, loguearse");
          }else{
            $this->view->DisplayCambioClave("Las contraseñas no coinciden");
          }
      }else{
        $this->view->DisplayCambioClave("No se encontro el usuario");
      }
    }
  }

  public function DisplayCambioClave(){
    $this->view->DisplayCambioClave();
  }
  
  // LOGOUT
  public function Logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }
}