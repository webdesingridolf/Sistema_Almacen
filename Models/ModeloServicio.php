<?php
include_once "Conexion.php";
class ModeloServicio{
    

    protected function CreateModeloServicio($detalle, $id_Usuario, $cantidad, $especifica, $precio, $total ){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql="INSERT INTO servicio (detalle, id_Usuario, cantidad, especifica, precio, total, id_Servicio) 
        VALUES (:detalle, :id_Usuario, :cantidad, :especifica, :precio, :total, :id_Servicio)";
        $stmt= $conexion->preparate($sql);
        $stmt->bindParam(":detalle",$detalle);
        $stmt->bindParam(":id_Usuario",$id_Usuario);
        $stmt->bindParam(":cantidad",$cantidad);
        $stmt->bindParam(":especifica",$especifica);
        $stmt->bindParam(":precio",$precio);
        $stmt->bindParam(":total",$total);
        $stmt->bindParam(":id_Servicio",$id_Servicio);
        $stmt->execute();
    }
    protected function ReedModeloServicio(){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql="SELECT * FROM servicio ";
        $stmt= $conexion->preparate($sql);
        return $stmt->execute();
    }
    protected function UpModeloServicio($detalle, $id_Usuario, $cantidad, $especifica, $precio, $total, $id_Servicio){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql="UPDATE servicio SET detalle=$detalle, id_Usuario=$id_Usuario, cantidad=$cantidad, especifica=$especifica, precio=$precio, total=$total WHERE id_Servicio=$id_Servicio";
        $stmt= $conexion->preparate($sql);
        $stmt->execute();
    }
    protected function DeleteModeloServicio($id_Servicio){
        $conexion= new Conexion();
        $conexion->conexionBD();
        $sql="DELETE FROM servicio WHERE id_Servicio=$id_Servicio ";
        $stmt= $conexion->preparate($sql);
        $stmt->execute();
    }

    public function Create_ModeloServicio($detalle, $id_Usuario, $cantidad, $especifica, $precio, $total){
        $ModeloServicio= new ModeloServicio();
        $ModeloServicio->CreateModeloServicio($detalle, $id_Usuario, $cantidad, $especifica, $precio, $total);
    }
    public function Reed_ModeloServicio(){
        $ModeloServicio= new ModeloServicio();
        return $ModeloServicio->ReedModeloServicio();
    }
    public function Up_ModeloServicio($detalle, $id_Usuario, $cantidad, $especifica, $precio, $total, $id_Servicio){
        $ModeloServicio= new ModeloServicio();
        $ModeloServicio->UpModeloServicio($detalle, $id_Usuario, $cantidad, $especifica, $precio, $total, $id_Servicio);
    }
    public function Delete_ModeloServicio($id_Servicio){
        $ModeloServicio= new ModeloServicio();
        $ModeloServicio->DeleteModeloServicio($id_Servicio);
    }
}
?>