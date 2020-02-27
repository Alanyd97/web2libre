<?php

class CategoriasModel {

    private $db;

// linkear nuestra base de datos
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=comercio;charset=utf8', 'root', '');
    }

    public function GetCategoria($id){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    public function GetCategorias(){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria");
        $sentencia->execute();
        $categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }
    public function InsertarCategoria($nombre,$descripcion){
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?,?)");
        $sentencia->execute(array($nombre,$descripcion));
    }

    public function BorrarCategoria($id){
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $ok = $sentencia->execute(array($id));
        if(!$ok)
        {
            return $sentencia->errorInfo();
        }
    }
    public function EditarCategoria($nombre,$descripcion,$id){
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre = ?, descripcion = ? WHERE id_categoria= ?");
        $sentencia->execute(array($nombre,$descripcion,$id));
    }


}

?>