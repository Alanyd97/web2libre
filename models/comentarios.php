<?php
class ComentarioModel
{
  private $db;
  function __construct(){
    $this->db = new  PDO('mysql:host=localhost;'.'dbname=comercio;charset=utf8', 'root', '');
  }
  function AgregarComentario($id_producto, $id_usuario, $puntaje, $comentario, $admin){
    $sentencia = $this->db->prepare("INSERT INTO comentario(id_producto, id_usuario, puntaje, comentario, admin) VALUES(?,?,?,?,?)");
    $sentencia->execute(array( $id_producto,$id_usuario,$puntaje , $comentario, $admin));
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