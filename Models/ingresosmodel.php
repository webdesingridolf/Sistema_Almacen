<?php
include_once 'Models/ingresos.php';

class IngresosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO ingreso(fecha,cantidad,id_Producto,precio,total,orden_de_compra,id_Especifica,id_usuario) 
                 VALUES(:fecha, :cantidad, :producto,:precio,:total,:ordencompra,:categoria,:usuario)');
            $query->execute([
                'fecha'=>$datos['fecha'],
                'cantidad'=>$datos['cantidad'],
                'producto'=>$datos['producto'],
                'precio'=>$datos['precio'],
                'total'=>$datos['total'],
                'ordencompra'=>$datos['ordenCompra'],
                'categoria'=>$datos['especifica'],
                'usuario'=>$datos['usuario']
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
        
       
        

    }
    public function AumentarStock($AS){
        try {
            $query=$this->prepare('UPDATE producto SET cantidad_Stock=cantidad_Stock+:cantidad
            WHERE id_Producto=:id');
            $query->execute([
                
                'cantidad'=>$AS['cantidad'],     
                'id'=>$AS['producto'],
                

            ]);
            return true;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            
            return false;
        }
    }
    public function DisminuirStock($DS){
        try {
            $query=$this->prepare('UPDATE producto SET cantidad_Stock=cantidad_Stock-:cantidad
            WHERE id_Producto=:id');
            $query->execute([
                
                'cantidad'=>$DS['cantidad'],     
                'id'=>$DS['producto'],
                

            ]);
            return true;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            
            return false;
        }
    }
    
    public function MostrarProductos(){
        $items=[];
        try {
            $mProductos=[];
            $query=$this->prepare("SELECT*FROM producto");
            $query->execute();
            $mProductos=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mProductos as $mProducto) {
                $item=new productos();
                $item->idProducto=$mProducto['id_Producto'];
                $item->detalle=$mProducto['detalle'];
                array_push($items,$item);
            }
       
             return $items;
        } catch (PDOException $e) {
            return [];
        }

    }
    public function MostrarEspecifica(){
        $items=[];
        try {
            $mEspecificas=[];
            $query=$this->prepare("SELECT*FROM especifica");
            $query->execute();
            $mEspecificas=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mEspecificas as $mEspecifica) {
                $item=new especifica();
                $item->idEspecifica=$mEspecifica['id_Especifica'];
                $item->codigo=$mEspecifica['codigo'];
            
                array_push($items,$item);
            }
            
            
             return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
        
    }
    public function Mostrar($fechaA,$fechaS){
     
        $items=[];
        try {
            $ingresos=[];
            $query=$this->query("SELECT ingreso.id_Ingreso,ingreso.fecha,ingreso.cantidad,unidad_medida.NombreUM,producto.detalle,especifica.detalle_Especifica,ingreso.precio,ingreso.total,ingreso.orden_de_compra,ingreso.id_Producto,ingreso.id_Especifica
            FROM ingreso, producto, especifica, usuario, unidad_medida
            WHERE producto.id_Producto=ingreso.id_Producto AND especifica.id_Especifica =ingreso.id_Especifica and usuario.id_Usuario=ingreso.id_usuario AND producto.id_Unidad_Medida=unidad_medida.id_Unidad_Medida AND ingreso.fecha BETWEEN "."'".$fechaA."'"."AND "."'".$fechaS."'"."");
            $query->execute();
            $ingresos=$query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($ingresos as $ingreso) {
                $item=new H_Ingresos();
                $item->id=$ingreso['id_Ingreso'];
                $item->fecha=$ingreso['fecha'];
                $item->cantidad=$ingreso['cantidad'];
                $item->unidadmedida=$ingreso['NombreUM'];

                $item->producto=$ingreso['detalle'];
                $item->precio=$ingreso['precio'];
                $item->total=$ingreso['total'];
                $item->ordenCompra=$ingreso['orden_de_compra'];
                $item->Especifica=$ingreso['detalle_Especifica'];
                $item->ProductoID=$ingreso['id_Producto'];
                $item->EspecificaID=$ingreso['id_Especifica'];

                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);



            }
            
             return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
         
        
         
 
     }
     public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM ingreso WHERE id_Ingreso='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            
            echo $e->getMessage();
            
            return false;
        }

    }
    public function actualizar($datos){
        try {
            $query=$this->prepare('UPDATE ingreso SET cantidad=:cantidad,id_Producto=:producto,precio=:precio,total=:total,orden_de_compra=:orden,id_Especifica=:especifica
            WHERE id_Ingreso=:id');
            $query->execute([
                
                'cantidad'=>$datos['cantidad'],
                'producto'=>$datos['producto'],
                'precio'=>$datos['precio'],
                'total'=>$datos['total'],
                'orden'=>$datos['ordenCompra'],
                'especifica'=>$datos['especifica'],
                'id'=>$datos['id'],
                
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
    }
    public function ListaIngresos(){
        $items=[];
        try {
            $ingresos=[];
            $query=$this->query("SELECT ingreso.id_Ingreso,ingreso.fecha,ingreso.cantidad,unidad_medida.NombreUM,producto.detalle,especifica.detalle_Especifica,ingreso.precio,ingreso.total,ingreso.orden_de_compra,ingreso.id_Producto,ingreso.id_Especifica
            FROM ingreso, producto, especifica, usuario, unidad_medida
            WHERE producto.id_Producto=ingreso.id_Producto AND especifica.id_Especifica =ingreso.id_Especifica and usuario.id_Usuario=ingreso.id_usuario AND producto.id_Unidad_Medida=unidad_medida.id_Unidad_Medida ");
            $query->execute();
            $ingresos=$query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($ingresos as $ingreso) {
                $item=new H_Ingresos();
                $item->id=$ingreso['id_Ingreso'];
                $item->fecha=$ingreso['fecha'];
                $item->cantidad=$ingreso['cantidad'];
                $item->unidadmedida=$ingreso['NombreUM'];

                $item->producto=$ingreso['detalle'];
                $item->precio=$ingreso['precio'];
                $item->total=$ingreso['total'];
                $item->ordenCompra=$ingreso['orden_de_compra'];
                $item->Especifica=$ingreso['detalle_Especifica'];
                $item->ProductoID=$ingreso['id_Producto'];
                $item->EspecificaID=$ingreso['id_Especifica'];

                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);



            }
            
             return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
         

    }
    

}

?>