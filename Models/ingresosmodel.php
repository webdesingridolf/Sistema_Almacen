<?php
class IngresosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        /*$query=$this->db->conect()->prepare('INSERT INTO ingreso(fecha,cantidad,id_Producto,precio,total,orden_de_compra,id_Categoria,id_usuario) VALUES(:fecha, :cantidad, :producto,:precio,:total,:ordencompra,:categoria,:usuario)');
        $query->execute([
            'fecha'=>$datos['fecha'],

        ])*/
        var_dump($datos);
        echo "funcion insertar modelo";

    }
    

}

?>