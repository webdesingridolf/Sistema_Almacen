
<?php
include_once 'Models/H_Ingresos.php';
class HistorialIngresosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function Mostrar(){
       $items=[];
       try {
           $query=$this->query("SELECT ingreso.id_Ingreso,ingreso.fecha,ingreso.cantidad,unidad_medida.nombre,producto.detalle,especifica.detalle_Especifica,ingreso.precio,ingreso.total,ingreso.orden_de_compra
           FROM ingreso, producto, especifica, usuario, unidad_medida
           WHERE producto.id_Producto=ingreso.id_Producto AND especifica.id_Especifica =ingreso.id_Especifica and usuario.id_Usuario=ingreso.id_usuario AND producto.id_Unidad_Medida=unidad_medida.id_Unidad_Medida");
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
    

}

?>