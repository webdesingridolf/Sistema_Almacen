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
    
   
    public function Mostrar($fechaA,$fechaS){
       
        $items=[];
        try {

            $almacenes=[];
            $query=$this->prepare("SELECT * FROM almacen WHERE fecha_Registro BETWEEN "."'".$fechaA."'"."AND "."'".$fechaS."'"."");
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

     public function MostrarLista(){
       
        $items=[];
        try {

            $almacenes=[];
            $query=$this->prepare("SELECT * FROM almacen ");
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

     public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM almacen WHERE id_Almacen='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            
            //echo $e->getMessage();
            
            return false;
        }

    }

    //------------------------------------Actualizar Almacen----------------------------------------------------------------------

    public function actualizar($datos){
        try {
            $query=$this->prepare('UPDATE almacen SET nombre=:nombre
            WHERE id_Almacen=:id');
            $query->execute([
                
                'nombre'=>$datos['Nombre'],
                'id'=>$datos['id'],
                

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
    }
//------------------------------------Fin actualizar Almacen------------------------------------------------------------
    

}

?>