<?php
class comentarioModel
{
  private $db;
  function __construct(){
    $this->db = new  PDO('mysql:host=localhost;'.'dbname=comercio;charset=utf8', 'root', '');
  }
  function AgregarComentario($puntaje, $comentario, $id_producto, $id_usuario, $admin){
    $sentencia = $this->db->prepare("INSERT INTO comentario(puntaje, comentario, id_producto, id_usuario, admin) VALUES(?,?,?,?,?)");
    $sentencia->execute(array($puntaje, $comentario, $id_producto, $id_usuario, $admin));
  }
 
  function GetComentarioProducto($id_producto){
    $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_producto = ? ORDER BY puntaje DESC");
    $sentencia->execute(array($id_producto));
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  
  function BorrarComentario($id_comentario){
    $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario = ?");
    $sentencia->execute(array($id_comentario));
  }
  public function getComentario($id_comentario)
    {
        $query = $this->db->prepare("SELECT * FROM comentario WHERE id_comentario = ?");
        $query->execute(array($id_comentario));
        $comentario = $query->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }
}
 ?>