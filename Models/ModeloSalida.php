<?php
include_once "Conexion.php";
class ModeloSalida{
    /* metodo privados */
    protected function CrateModeloSalida($id_Salida, $fecha, $cantidada, $id_Producto, $id_Usuario){
        $Conexion = new Conexion();
        $conexion = $Conexion->conexionbd();
        $sql=" INSERT INTO salida(fecha, cantidada, id_Producto, id_Usuario) VALUES(:fecha, :cantidada, :id_Producto, :id_Usuario) ";
        $stmt=$conexion->prepare($sql);
        $stmt->bindParam(":fecha",$fecha);
        $stmt->bindParam(":cantidada",$cantidada);
        $stmt->bindParam(":id_Producto",$id_Producto);
        $stmt->bindParam(":id_Usuario",$id_Usuario);
        $stmt->execute();
    }
    protected function ReedModeloSalida(){
        $Conexion = new Conexion();
        $conexion = $Conexion->conexionbd();
        $sql="SELECT * FROM salida";
        $stmt=$conexion->prepare($sql);
        return $stmt->execute();
    }
    protected function UpModeloSalida($fecha, $cantidada, $id_Producto, $id_Usuario, $id_Salida){
        $Conexion = new Conexion();
        $conexion = $Conexion->conexionbd();
        $sql="UPDATE salida SET fecha = $fecha, cantidada = $cantidada, id_Producto = $id_Producto, id_Usuario = $id_Usuario WHERE id_Salida=$id_Salida ";
        $stmt=$conexion->prepare($sql);
        $stmt->execute();
    }
    protected function DeleteModeloSalida($id_Salida){
        $Conexion = new Conexion();
        $conexion = $Conexion->conexionbd();
        $sql="DELETE FROM salida WHERE id_Salida=$id_Salida";
        $stmt=$conexion->prepare($sql);
        $stmt->execute();
    }

    /** metodo publico */
    public function Create_ModeloSalida($id_Salida, $fecha, $cantidada, $id_Producto, $id_Usuario){
        $ModeloSalida = new ModeloSalida();
        $ModeloSalida->CrateModeloSalida($id_Salida, $fecha, $cantidada, $id_Producto, $id_Usuario);
    }
    public function Reed_ModeloSalida(){
        $ModeloSalida = new ModeloSalida();
        return $ModeloSalida->ReedModeloSalida();
    }
    public function Up_ModeloSalida($fecha, $cantidada, $id_Producto, $id_Usuario, $id_Salida){
        $ModeloSalida = new ModeloSalida();
        $ModeloSalida->UpModeloSalida($fecha, $cantidada, $id_Producto, $id_Usuario, $id_Salida);
    }
    public function Delete_ModeloSalida($id_Salida){
        $ModeloSalida = new ModeloSalida();
        $ModeloSalida->DeleteModeloSalida($id_Salida);
    }

}
?>