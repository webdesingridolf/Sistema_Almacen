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
            $query=$this->query("SELECT*FROM almacen");
             while ($row=$query->fetch()) {
                 $item=new almacen();
                 $item->idAlmacen=$row['id_Almacen'];
                 $item->nombre=$row['nombre'];
                 
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
            $query=$this->query("SELECT*FROM especifica");
             while ($row=$query->fetch()) {
                 $item=new especifica();
                 $item->idEspecifica=$row['id_Especifica'];
                 $item->detalle=$row['codigo'];
             
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
            $query=$this->query("SELECT*FROM unidad_medida");
             while ($row=$query->fetch()) {
                 $item=new unidadMedida();
                 $item->idUnidadMedida=$row['id_Unidad_Medida'];
                 $item->nombreUM=$row['nombre'];
                 
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
            $query=$this->query("SELECT    producto.id_Producto,producto.detalle,unidad_medida.nombre,producto.cantidad_Stock,almacen.nombre,especifica.detalle_Especifica,producto.fecha_Registro 
            FROM almacen, producto, especifica,  unidad_medida
            WHERE producto.id_Almacen =almacen.id_Almacen  AND especifica.id_Especifica =producto.id_Especifica  AND producto.id_Unidad_Medida=unidad_medida.id_Unidad_Medida ");
            /* foreach ($row=$query->fetch()) {
                $item=new ListaProductos();
                $item->id=$row['id_Producto'];
                $item->detalle=$row['detalle'];
                $item->unidadmedida=$row['nombre'];
                $item->stock=$row['cantidad_Stock'];
                $item->almacen=$row['nombre'];
                $item->Especifica=$row['detalle_Especifica'];
                $item->fecha=$row['fecha_Registro'];
                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);
             }*/
             while ($row=$query->fetch()) {
                 $item=new ListaProductos();
                 $item->id=$row['id_Producto'];
                 $item->detalle=$row['detalle'];
                 $item->unidadmedida=$row['nombre'];
                 $item->stock=$row['cantidad_Stock'];
                 $item->almacen=$row['nombre'];
                 $item->Especifica=$row['detalle_Especifica'];
                 $item->fecha=$row['fecha_Registro'];
                 
                 //$item->usuario=$row['id_usuario'];
                 array_push($items,$item);
 
             }
             return $items;
        } catch (PDOException $e) {
            return [];
        }
         
        
         
 
     }
    }