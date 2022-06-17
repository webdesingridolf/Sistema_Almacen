<?php
include_once 'Models/almacen.php';

class AlmacenesModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO almacen(nombre,fecha_Registro) 
                 VALUES(:nombre, :fecha)');
            $query->execute([
                'nombre'=>$datos['nombre'],
                
                'fecha'=>$datos['fecha']
                
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
        
       
        

    }
    
   
    public function Mostrar(){
       
        $items=[];
        try {

            $almacenes=[];
            $query=$this->prepare("SELECT * FROM almacen");
            $query->execute();
            $almacenes=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($almacenes as $almacen){
                $item=new MAlmacen();
                $item->id=$almacen['id_Almacen'];
                $item->nombre=$almacen['nombre'];
                $item->fecha=$almacen['fecha_Registro'];
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         
        
         
 
     }
    

}

?>