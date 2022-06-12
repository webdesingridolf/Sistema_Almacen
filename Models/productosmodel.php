<?php
include_once 'Models/productos.php';

class ProductosModel extends Model{
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
    public function MostrarProductos(){
        $items=[];
        try {
            $query=$this->db->conect()->query("SELECT*FROM producto");
             while ($row=$query->fetch()) {
                 $item=new productos();
                 $item->idProducto=$row['id_Producto'];
                 $item->detalle=$row['detalle'];
                 
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
            $query=$this->db->conect()->query("SELECT*FROM especifica");
             while ($row=$query->fetch()) {
                 $item=new especifica();
                 $item->idEspecifica=$row['id_Especifica'];
                 $item->codigo=$row['codigo'];
             
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
            $query=$this->db->conect()->query("SELECT    producto.id_Producto,producto.detalle,unidad_medida.nombre,producto.cantidad_Stock,almacen.nombre,especifica.detalle_Especifica,producto.fecha_Registro 
            FROM almacen, producto, especifica,  unidad_medida
            WHERE producto.id_Almacen =almacen.id_Almacen  AND especifica.id_Especifica =producto.id_Especifica  AND producto.id_Unidad_Medida=unidad_medida.id_Unidad_Medida AND producto.fecha_Registro BETWEEN '2022-06-10' AND '2022-06-12'");
             while ($row=$query->fetch()) {
                 $item=new H_Ingresos();
                 $item->id=$row['id_Ingreso'];
                 $item->fecha=$row['fecha'];
                 $item->cantidad=$row['cantidad'];
                 $item->unidadmedida=$row['nombre'];
 
                 $item->producto=$row['detalle'];
                 $item->precio=$row['precio'];
                 $item->total=$row['total'];
                 $item->ordenCompra=$row['orden_de_compra'];
                 $item->Especifica=$row['detalle_Especifica'];
                 //$item->usuario=$row['id_usuario'];
                 array_push($items,$item);
 
             }
             return $items;
        } catch (PDOException $e) {
            return [];
        }
         
        
         
 
     }