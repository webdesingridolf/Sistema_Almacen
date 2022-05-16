<?php
include_once "Conexion.php"; 
class ModeloCategoria{

    /*metodos privados */
    protected function CreateModeloCategoria($nombre,$total_Categoria){
        $Conexion = new Conexion();
        $Conexion->conexionBD();
        $sql = "INSERT INTO (nombre,total_Categoria) VALUES(:nombre,:total_Categoria)";
        $stmt= $Conexion->prepare($sql);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":total_Categoria",$total_Categoria);
        $stmt->execute();
    } 
    protected function ReedModeloCategoria(){
        $Conexion = new Conexion();
        $Conexion->conexionBD();
        $sql="SELECT * FROM categoria";
        $stmt= $Conexion->prepare($sql);
        return $stmt->execute();
    } 
    protected function UpModeloCategoria($nombre,$total_Categoria,$id_Categoria){
        $Conexion = new Conexion();
        $Conexion->conexionBD();
        $sql="UPDATE categoria SET nombre=$nombre, total_Categoria=$total_Categoria WHERE id_Categoria = $id_Categoria  ";
        $stmt= $Conexion->prepare($sql);
        $stmt->execute();
    } 
    protected function DeleteModeloCategoria($id_Categoria){
        $Conexion = new Conexion();
        $Conexion->conexionBD();
        $sql="DELETE FROM categoria WHERE id_Categoria = $id_Categoria";
        $stmt= $Conexion->prepare($sql);
        $stmt->execute();
    } 

    /*metodos publicos*/
    protected function Create_ModeloCategoria($nombre,$total_Categoria){
        $ModeloCategoria = new ModeloCategoria();
        $ModeloCategoria->CreateModeloCategoria($nombre,$total_Categoria);
    } 
    protected function Reed_ModeloCategoria(){
        $ModeloCategoria = new ModuloCategoria();
        return $ModeloCategoria->ReedModeloCategoria();
    } 
    protected function Up_ModeloCategoria($nombre,$total_Categoria,$id_Categoria){
        $ModeloCategoria = new ModeloCategoria();
        $ModeloCategoria->UpModeloCategoria($nombre,$total_Categoria,$id_Categoria);
    } 
    protected function Delete_ModeloCategoria($id_Categoria){
        $ModeloCategoria = new ModeloCategoria();
        $ModeloCategoria->DeleteModeloCategoria($id_Categoria);
    }
}

?>