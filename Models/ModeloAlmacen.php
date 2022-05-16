<?php
include_once "Conexion.php";
class ModeloAlmacen{

    /*metodos crud*/ 
    private function CreateAlmacen($nombre){
        $con= new Conexion();
        $conexion = $con->conexionBD();
        $sql="INSERT INTO almacen (nombre) VALUES(:nombre)";    
        $stmt= $conexion->prepare($sql);

        $stmt->bindParam(":nombre",$nombre);
        $stmt->execute();
    }
    private function ReedAlmacen(){
        $con= new Conexion();
        $conexion = $con->conexionBD();
        $sql="SELECT * FROM almacen";
        $stmt= $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->execute();

    }
    private function UpAlmacen($nombre,$id_Almacen){
        $con= new Conexion();
        $conexion = $con->conexionBD();
        $sql="UPDATE almacen SET nombre=$nombre WHERE id_Almacen=$id_Almacen";
        $stmt=$conexion->prepare($sql);
        $stmt->execute();
    }
    private function DeleteAlmacen($id_Almacen){
        $con= new Conexion();
        $conexion = $con->conexionBD();
        $sql="DELETE FROM almacen WHERE id_Almacen=$id_Almacen";
        $stmt=$conexion->prepare($sql);
        $stmt->EXECUTE();
    }



    /*funciones pubicas */
    public function Create_Almacen($nombre){
        $ModeloAlmacen= NEW ModeloAlmacen();
        $ModeloAlmacen->CreateAlmacen($nombre);

    }
    public function Reed_Almacen(){
        $ModeloAlmacen= NEW ModeloAlmacen();
        return $ModeloAlmacen->ReedAlmacen();
    }
    public function Up_Almacen($nombre,$id_Almacen){
        $ModeloAlmacen= NEW ModeloAlmacen();
        $ModeloAlmacen->UpAlmacen($nombre,$id_Almacen);
    }
    public function Delete_Almacen($id_Almacen){
        $ModeloAlmacen = NEW ModeloAlmacen();
        $ModeloAlmacen->DeleteAlmacen($id_Almacen);
    }
    
}
?>