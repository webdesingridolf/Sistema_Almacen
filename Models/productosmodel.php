<?php
include_once 'Models/productos.php';

class ProductosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO producto(detalle,id_Unidad_Medida,cantidad_Stock,id_Almacen,id_Especifica,fecha_Registro) 
                 VALUES(:detalle, :unidadMedida, :stock,:almacen,:especifica,:fecha)');
            $query->execute([
                'detalle'=>$datos['detalle'],
                'unidadMedida'=>$datos['unidadmedida'],
                'stock'=>$datos['stock'],
                'almacen'=>$datos['almacen'],
                'especifica'=>$datos['especifica'],
                'fecha'=>$datos['fecha']
                
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
        
       
        

    }
    //funcion para mostrar en la vista  las categorias 
    public function MostrarAlmacen(){
        $items=[];
        try {
            $mAlmacenes=[];
            $query=$this->query("SELECT*FROM almacen");
            $query->execute();
            $mAlmacenes=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mAlmacenes as $mAlmacen) {
                $item=new almacen();
                 $item->idAlmacen=$mAlmacen['id_Almacen'];
                 $item->nombre=$mAlmacen['nombre'];
                 
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
            $query=$this->query("SELECT*FROM especifica");
            $query->execute();
            $mEspecificas=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mEspecificas as $mEspecifica) {
                $item=new especifica();
                $item->idEspecifica=$mEspecifica['id_Especifica'];
                $item->detalle=$mEspecifica['codigo'];
            
                array_push($items,$item);
            }
            
             return $items;
        } catch (PDOException $e) {
            return [];
        }
        
    }
    public function MostrarUnidadMedida(){
        $items=[];
        try {
            $mUnidadMedidas=[];
            $query=$this->prepare("SELECT*FROM unidad_medida");
            $query->execute();
            $mUnidadMedidas=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mUnidadMedidas as $mUnidadMedida) {
                $item=new unidadMedida();
                $item->idUnidadMedida=$mUnidadMedida['id_Unidad_Medida'];
                $item->nombreUM=$mUnidadMedida['NombreUM'];
                
                array_push($items,$item);

            }

             return $items;
        } catch (PDOException $e) {
            return [];
        }

    }
    public function Mostrar(){
        $items=[];
        try {
            $Productos=[];
            $query=$this->prepare("SELECT    producto.id_Producto,producto.detalle,unidad_medida.NombreUM,producto.id_Almacen,producto.id_Especifica,producto.id_Unidad_Medida,producto.cantidad_Stock,almacen.nombre,especifica.detalle_Especifica,producto.fecha_Registro 
            FROM almacen, producto, especifica,  unidad_medida
            WHERE producto.id_Almacen =almacen.id_Almacen  AND especifica.id_Especifica =producto.id_Especifica  AND producto.id_Unidad_Medida=unidad_medida.id_Unidad_Medida ");
             $query->execute();
             $Productos=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($Productos as $Producto) {
               $item=new ListaProductos();
                 $item->id=$Producto['id_Producto'];
                 $item->detalle=$Producto['detalle'];
                 $item->unidadmedida=$Producto['NombreUM'];
                 $item->stock=$Producto['cantidad_Stock'];
                 $item->almacen=$Producto['nombre'];
                 $item->Especifica=$Producto['detalle_Especifica'];
                 $item->fecha=$Producto['fecha_Registro'];
                 $item->idAlmacen=$Producto['id_Almacen'];
                 $item->idEspecifica=$Producto['id_Especifica'];
                 $item->idUnidadMedida=$Producto['id_Unidad_Medida'];
                 
                 array_push($items,$item);
             }
             
             return $items;
        } catch (PDOException $e) {
            return [];
        }
         
        
         
 
     }
     public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM producto WHERE id_Producto='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            
            //echo $e->getMessage();
            
            return false;
        }

    }
    public function actualizar($datos){
        try {
            $query=$this->prepare('UPDATE producto SET detalle=:detalle,id_Unidad_Medida=:UnidadMedida,cantidad_Stock=:Stock,id_Almacen=:Almacen,id_Especifica=:Especifica
             WHERE id_Producto=:id');
            $query->execute([
                
                'detalle'=>$datos['Detalle'],
                'UnidadMedida'=>$datos['UM'],
                'Stock'=>$datos['Stock'],
                'Almacen'=>$datos['Almacen'],
                'Especifica'=>$datos['Especifica'],
                'id'=>$datos['id'],
                
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
    }



    




    }