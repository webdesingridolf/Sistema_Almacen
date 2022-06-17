<?php
include_once 'Models/especifica.php';

class EspecificaModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO especifica(detalle_Especifica,codigo,fecha_Registro) 
                 VALUES(:detalle, :codigo, :fecha)');
            $query->execute([
                'detalle'=>$datos['detalle'],
                'codigo'=>$datos['codigo'],
                'fecha'=>$datos['fecha']
                
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
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

            $especifica=[];
            $query=$this->prepare("SELECT * FROM especifica");
            $query->execute();
            $especifica=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($especifica as $espe){
                $item=new MEspecifica();
                $item->id=$espe['id_Especifica'];
                $item->detalle=$espe['detalle_Especifica'];
                $item->codigo=$espe['codigo'];
                $item->fecha=$espe['fecha_Registro'];
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
         
        
         
 
     }
    

}

?>