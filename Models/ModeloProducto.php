<?php
    include_once "Conexion.php";
    class ModeloProducto{


        protected function CreateModeloProducto($detalle,$id_Unidad_Medida,$cantidad_Stock,$id_Almacen,$id_Categoria){
            $Conexion = new Conexion();
            $conexion=$Conexion->conexionBD();
            $sql="INSERT INTO producto (detalle,id_Unidad_Medida,cantidad_Stock,id_Almacen,id_Categoria) VALUES (:detalle,:id_Unidad_Medida,:cantidad_Stock,:id_Almacen,:id_Categoria)";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(":detalle",$detalle);
            $stmt->bindParam(":id_Unidad_Medida",$id_Unidad_Medida);
            $stmt->bindParam(":cantidad_Stock",$cantidad_Stock);
            $stmt->bindParam(":id_Almacen",$id_Almacen);
            $stmt->bindParam(":id_Categoria",$id_Categoria);
            $stmt->execute();

        }
        protected function ReedModeloProducto(){
            $Conexion = new Conexion();
            $conexion=$Conexion->conexionBD();
            $sql="SELECT * FROM producto";
            $stmt=$conexion->prepare($sql);
            return $stmt->execute();

        }
        protected function UpModeloProducto($detalle,$id_Unidad_Medida,$cantidad_Stock,$id_Almacen,$id_Categoria,$id_Producto){
            $Conexion = new Conexion();
            $conexion=$Conexion->conexionBD();
            $sql="UPDATE producto SET detalle=$detalle, id_Unidad_Medida=$id_Unidad_Medida, cantidad_Stock=$cantidad_Stock, id_Almacen=$id_Almacen, id_Categoria=$id_Categoria WHERE id_Producto=$id_Producto";
            $stmt=$conexion->prepare($sql);
            $stmt->execute();

        }
        protected function DeleteModeloProducto($id_Producto){
            $Conexion = new Conexion();
            $conexion=$Conexion->conexionBD();
            $sql="DELETE FROM producto WHERE id_Producto=$id_Producto";
            $stmt=$conexion->prepare($sql);
            $stmt->execute();

        }

        /*metodos publicos */

        public function Create_ModeloProducto($detalle,$id_Unidad_Medida,$cantidad_Stock,$id_Almacen,$id_Categoria){
            $ModeloProducto = new ModeloProducto(); 
            $ModeloProducto->CreateModeloProducto($detalle,$id_Unidad_Medida,$cantidad_Stock,$id_Almacen,$id_Categoria);  
                          
        }
        public function Reed_ModeloProducto(){
            $ModeloProducto = new ModeloProducto(); 
            return $ModeloProducto->ReedModeloProducto();    
                    
        }
        public function Up_ModeloProducto($detalletalle,$id_Unidad_Medida,$cantidad_Stock,$id_Almacen,$id_Categoria,$id_Producto){
            $ModeloProducto = new ModeloProducto(); 
            $ModeloProducto->UpModeloProducto($detalletalle,$id_Unidad_Medida,$cantidad_Stock,$id_Almacen,$id_Categoria,$id_Producto);      
                  
        }
        public function Delete_ModeloProducto($id_Producto){
            $ModeloProducto = new ModeloProducto(); 
            $ModeloProducto->DeleteModeloProducto($id_Producto);  
                      
        }
    }

?>