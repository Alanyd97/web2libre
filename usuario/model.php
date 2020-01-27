<?php


class UsuarioModel{

  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'.'dbname=comercio;charset=utf8', 'root', '');
  }

  // INSERTAR UN USUARIO A LA BD
  function InsertarUsuario($nombre,$clave, $admin){
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,clave, admin) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$clave, $admin));
  }
  // DEVUELVE USUARIO DE LA BD
  public function GetUsuario($nombre){
    $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE nombre = ?");
    $sentencia->execute(array($nombre));
    $usuario = $sentencia->fetch(PDO::FETCH_OBJ);   
    return $usuario;
  }
  public function GetUsuarioID($id){
    $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE id_usuario = ?");
    $sentencia->execute(array($id));
    $usuario = $sentencia->fetch(PDO::FETCH_OBJ);   
    return $usuario;
  }
  public function GetUsuarios(){
    $sentencia = $this->db->prepare( "SELECT * from usuario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  public function BorrarUsuario($id){
    $sentencia = $this->db->prepare("DELETE FROM Usuario WHERE id_Usuario=?");
    $sentencia->execute(array($id));
  }
  public function EditarUsuario($nombre,$clave,$admin, $id){
    $sentencia = $this->db->prepare("UPDATE Usuario SET nombre =?, clave = ?, admin = ? WHERE id_Usuario=?");
    $sentencia->execute(array($nombre,$clave,$admin, $id));
  }
  function TogglePermiso($permiso, $id){
    $sentencia = $this->db->prepare("UPDATE Usuario SET admin = ? WHERE id_Usuario=?");
    $sentencia->execute(array($permiso,$id));
  }
}
