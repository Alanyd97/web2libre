<?php
require_once("controllerApi.php");
require_once("./models/comentarios.php");
class ComentariosApiController extends ApiController {
    private $model;

    public function __construct() {
        parent::__construct();
        $this->model = new ComentarioModel();
    }

    public function getComentarios($params = []) {
        $comentarios = $this->model->GetComentarioProducto($params[':ID']);
        $this->view->response($comentarios, 200);
    }

    public function AgregarComentario($params = []){
        if (isset($params)){
            session_start();
            if (isset($_SESSION['id_usuario']) && $_SESSION['admin'] == 1){
                $comentarios = $this->getData();
                $this->model->AgregarComentario( $comentarios->idProducto, $comentarios->idUsr, $comentarios->puntaje, $comentarios->comentario,$comentarios->admin);
            }else{
                $this->view->response("No puede comentar", 404);
            }
            session_abort();
        }
    }


    public function BorrarComentario($params = []){
        $id_comentario = $params[':ID'];
        $comentario = $this->model->getComentario($id_comentario);
        if ($comentario) {
            session_start();
            if (isset($_SESSION['id_usuario']) && $_SESSION['admin'] == 0){
                $this->model->BorrarComentario($id_comentario);
                $this->view->response("Comentario eliminado", 200);
            }
            session_abort();
        }
        else{
            $this->view->response("Comentario not found", 404);
        } 
    }

   
}
