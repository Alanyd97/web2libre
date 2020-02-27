<?php
require_once "./categoria/model.php";
require_once "./categoria/view.php";
require_once "./usuario/model.php";
require_once "./Seguridad.php";

class CategoriasController  extends Seguridad{

    private $model;
    private $view;
    private $usrModel;

	function __construct(){
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView(); 
        $this->usrModel = new UsuarioModel(); 
    }

    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategorias(){
        session_start();
        $categoria = $this->model->Getcategorias();
        if (isset($_SESSION['id_usuario'])){
            session_abort();
            $usuario = $this->usrModel->GetUsuarioID($_SESSION['id_usuario']);
        }else{
            $usuario = null;
        }
        $this->view->DisplayCategoria($categoria, $usuario);
    }
    
    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function GetCategoria($params){
        $categoria = $this->model->GetCategoria($params);
        $this->view->DisplayCategoria($categoria);
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarCategoria(){
        session_start();
        if ($_SESSION['admin'] == 0 && $_POST['nombre'] != ''  && $_POST['descripcion'] != '') {
            session_abort();
            $this->model->InsertarCategoria($_POST['nombre'],$_POST['descripcion']);
        }else{
            session_abort();
            $this->GetCategorias();
        }
        header(CATEGORIAS);
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarCategoria($params){
        session_start();
        if (isset($_SESSION['id_usuario'])){
            session_abort();
            $usuario = $this->usrModel->GetUsuarioID($_SESSION['id_usuario']);
        }else{
            $usuario = null;
        }
        $categoria = $this->model->GetCategorias();
        if ($_SESSION['admin'] == 0) {
            $error = $this->model->BorrarCategoria($params[0]);
            if ($error != '') {
                $error = 'No se puede borrar esa categoria';
            }
            $this->GetCategorias();
            $this->view->DisplayCategoria($categoria, $usuario, $error);
        }else{
            $this->GetCategorias();
        }
    }

    public function DisplayEditar($id){
        session_start();                    
        if ($_SESSION['admin'] == 0) {
            session_abort();
            $categorias = $this->model->GetCategoria($id[0]);
            $usuario = $this->usrModel->GetUsuarioID($_SESSION['id_usuario']);
            $this->view->DisplayEditar($categorias, $usuario);
        }
    }

    public function EditarCategoria($id){
        session_start();
        if ($_SESSION['admin'] == 0 && ($_POST['nombre'] != '') && ($_POST['descripcion']!= '')) {
            session_abort();
            $this->model->EditarCategoria($_POST['nombre'],$_POST['descripcion'],$id[0]);
            header(CATEGORIAS);
        }
    }
}
?>