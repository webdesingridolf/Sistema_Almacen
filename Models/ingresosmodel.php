<?php
include_once 'Models/ingresos.php';

class IngresosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        try {
            $query=$this->db->conect()->prepare(
                'INSERT INTO ingreso(fecha,cantidad,id_Producto,precio,total,orden_de_compra,id_Categoria,id_usuario) 
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
            //echo $e->getMessage();
            echo "ingreso existente ";
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
                 $item->detalle_especifica=$row['detalle_Especifica'];
             
                 array_push($items,$item);
 
             }
             return $items;
        } catch (PDOException $e) {
            return [];
        }
        
    }
    

}

?>