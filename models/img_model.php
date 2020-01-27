<?php
class ImgModel
{
  private $db;
  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'.'dbname=comercio;charset=utf8', 'root', '');
  }
function GetImagenProducto($id_producto){
      $sentencia = $this->db->prepare( "SELECT * FROM imagen WHERE id_producto = ?");
       $sentencia->execute(array($id_producto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
  }
  function GetImagenes(){
      $sentencia = $this->db->prepare( "SELECT * FROM imagen");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  function AgregarImagen($path,$id_producto){
    $sentencia = $this->db->prepare("INSERT INTO imagen(src,id_producto) VALUES(?,?)");
    $sentencia->execute(array($path,$id_producto));
  }
  function BorrarImagen($id_imagen){
    $sentencia = $this->db->prepare( "DELETE FROM imagen WHERE id_img = ?");
    $sentencia->execute(array($id_imagen));
  }
  function GetImagenesProducto($id_producto){
    $sentencia = $this->db->prepare( "SELECT * FROM imagen WHERE id_producto = ?");
     $sentencia->execute(array($id_producto));
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
}
    
}
 ?>