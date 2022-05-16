<?php
include_once "Conexion";
class ModeloUnidadMedida{


    /*metodos privados*/
    protected function CreateUnidadMedida($nombre,$simbolo){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql = "INSERT INTO unidad_medida (nombre,simbolo) VALUES(:nombre,:simbolo)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":simbolo",$simbolo);
        $stmt->execute();
    }
    protected function ReedUnidadMedida(){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql = "SELECT * FROM unidad_medida";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute();
    }
    protected function UpUnidadMedida($nombre,$simbolo,$id_Unidad_Medida){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql = "UPDATE unidad_medida SET nombre = $nombre, simbolo = $simbolo WHERE id_Unidad_Medida=$id_Unidad_Medida";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
    }
    protected function DeleteUnidadMedida($id_Unidad_Medida){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql = "DELETE FROM unidad_medida WHERE id_Unidad_Medida=$id_Unidad_Medida";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
    }
    /*metodos publicos*/
    public function Create_UnidadMedida($nombre,$simbolo){
        $ModeloUnidadMedida= new ModeloUnidadMedida();
        $ModeloUnidadMedida->CreateUnidadMedida($nombre,$simbolo);
    }
    public function Reed_UnidadMedida(){
        $ModeloUnidadMedida= new ModeloUnidadMedida();
        return $ModeloUnidadMedida->ReedUnidadMedida();
    }
    public function Up_UnidadMedida($nombre,$simbolo,$id_Unidad_Medida){
        $ModeloUnidadMedida= new ModeloUnidadMedida();
        $ModeloUnidadMedida->UpUnidadMedida($nombre,$simbolo,$id_Unidad_Medida);
    }
    public function Delete_UnidadMedida($id_Unidad_Medida){
        $ModeloUnidadMedida= new ModeloUnidadMedida();
        $ModeloUnidadMedida->DeleteUnidadMedida($id_Unidad_Medida);
    }
}
?>