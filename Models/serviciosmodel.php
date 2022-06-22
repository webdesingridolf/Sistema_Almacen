
<?php
include_once 'Models/servicios.php';
class ServiciosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO servicio(fecha,detalle,id_Usuario,cantidad,id_Especifica,precio,total,O_S) 
                 VALUES(:fecha,:detalle,:usuario,:cantidad,:especifica,:precio,:total,:OS )');
            $query->execute([
                'fecha'=>$datos['fecha'],
                'detalle'=>$datos['detalle'],
                'usuario'=>$datos['usuario'],
                'cantidad'=>$datos['cantidad'],
                'especifica'=>$datos['especifica'],
                'precio'=>$datos['precio'],
                'total'=>$datos['total'],
                'OS'=>$datos['os'],
                
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }

    }
    public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM servicio WHERE id_Servicio='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }

    }


    public function Mostrar(){
        $items=[];
        try {

            $servicios=[];
            $query=$this->prepare("SELECT * FROM servicio");
            $query->execute();
            $servicios=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($servicios as $servicio){
                $item=new ListaServicios();
                $item->id=$servicio['id_Servicio'];
                $item->fecha=$servicio['fecha'];
                $item->detalle=$servicio['detalle'];
                $item->cantidad=$servicio['cantidad'];
                $item->Especifica=$servicio['id_Especifica'];
                $item->precio=$servicio['precio'];
                $item->total=$servicio['total'];
                $item->os=$servicio['O_S'];
                
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
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
    

}

?>