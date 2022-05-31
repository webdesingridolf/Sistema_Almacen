<?php
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
    

}

?>