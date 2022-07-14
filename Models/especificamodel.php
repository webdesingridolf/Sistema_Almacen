<?php
include_once 'Models/especifica.php';

class EspecificaModel extends Model{
    public function __construct(){
        parent::__construct();
    }
//----------------------------------Insertar Especifica-----------------------------------------------------------------
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
//-----------------------------------Fin Insertar Especifica----------------------------------------------------------

//---------------------------------------Mostrar Lista Especifica-----------------------------------------------------    
    public function ListaEspecifica(){
        $items=[];
        try {

            $especifica=[];
            $query=$this->prepare("SELECT * FROM especifica ");
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
//-----------------------------------------Fin Mostrar Lista Especifica--------------------------------------------

//------------------------------------------Mostrar especifica por fecha---------------------------------------------
    public function Mostrar($fechaA,$fechaS){
       
        $items=[];
        try {

            $especifica=[];
            $query=$this->prepare("SELECT * FROM especifica WHERE fecha_Registro BETWEEN "."'".$fechaA."'"."AND "."'".$fechaS."'"."");
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
//--------------------------------------fin Mostrar Especificapor fecha------------------------------------------
 
//----------------------------------Eliminar Especifica---------------------------------------------------------------
    public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM Especifica WHERE id_Especifica='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            
            //echo $e->getMessage();
            
            return false;
        }

    }
//--------------------------------------Fin eliminar Especifica---------------------------------------------------
//------------------------------------Actualizar Especifica----------------------------------------------------------------------

    public function actualizar($datos){
        try {
            $query=$this->prepare('UPDATE especifica SET detalle_Especifica=:detalle,codigo=:codigo
            WHERE id_Especifica=:id');
            $query->execute([
                
                'detalle'=>$datos['Detalle'],
                'codigo'=>$datos['Codigo'],
                
                'id'=>$datos['id'],
                

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
    }
//------------------------------------Fin actualizar Especifica------------------------------------------------------------


}

?>