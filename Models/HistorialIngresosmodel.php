
<?php
include_once 'Models/ingresos.php';
class HistorialIngresosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function Mostrar(){
       $items=[];
       try {
           $query=$this->db->conect()->query("SELECT*FROM ingreso");
            while ($row=$query->fetch()) {
                $item=new ingresos();
                $item->id=$row['id_Ingreso'];
                $item->fecha=$row['fecha'];
                $item->cantidad=$row['cantidad'];
                $item->producto=$row['id_Producto'];
                $item->precio=$row['precio'];
                $item->total=$row['total'];
                $item->ordenCompra=$row['orden_de_compra'];
                $item->Especifica=$row['id_Categoria'];
                $item->usuario=$row['id_usuario'];
                array_push($items,$item);

            }
            return $items;
       } catch (PDOException $e) {
           return [];
       }
        
       
        

    }
    

}

?>