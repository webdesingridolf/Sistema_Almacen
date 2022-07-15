
<?php
include_once 'Models/UnidadMedida.php';
class UnidadMedidamodel extends Model{
    public function __construct(){
        parent::__construct();
    }
/*---------------------------- funcion insertar Unidad Medida  ----------------------------------------------------------------------------------------------------*/
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO unidad_medida(NombreUM,simbolo, fecha_Registro ) 
                 VALUES(:unidadMedida,:Simbolo,:fecha)');
            $query->execute([
                'fecha'=>$datos['fecha'],
                'unidadMedida'=>$datos['unidadMedida'],
                'Simbolo'=>$datos['simbolo'],
       
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }

    }
/*----------------------------fin  funcion insertar Unidad Medida   ----------------------------------------------------------------------------------------------------*/
/*---------------------------- funcion eliminar Unidad Medida  ----------------------------------------------------------------------------------------------------*/
    public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM unidad_medida WHERE id_Unidad_Medida='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }

    }
/*---------------------------- fin funcion eliminar Unidad Medida  ----------------------------------------------------------------------------------------------------*/

/*---------------------------- funcion mostrar Unidad Medida  ----------------------------------------------------------------------------------------------------*/
    public function Mostrar(){
        $items=[];
        try {

            $UnidadMedida=[];
            $query=$this->prepare("SELECT*FROM unidad_medida ");
            $query->execute();
            $UnidadMedida=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($UnidadMedida as $Unidad){
                $item=new Unidades();
                $item->id=$Unidad['id_Unidad_Medida'];
                $item->UnidadMedida=$Unidad['NombreUM'];
                $item->Simbolo=$Unidad['simbolo'];
                $item->FechaRegistro=$Unidad['fecha_Registro'];
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
/*---------------------------- fin funcion mostrar Unidad Medida  ----------------------------------------------------------------------------------------------------*/




/*------------------------------------------funcion actualizar Unidad Medida---------------------------------------------- */


public function actualizar($datos){
    try {
        $query=$this->prepare('UPDATE unidad_medida SET NombreUM=:UnidadMedida,simbolo=:simbolo
        WHERE id_Unidad_Medida=:id');
        $query->execute([
            
            'UnidadMedida'=>$datos['UnidadMedida'],
            'simbolo'=>$datos['Simbolo'],
            'id'=>$datos['id'],
            
            

        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        //echo "ingreso existente ";
        return false;
    }
}




/*------------------------------------------fin funcion actualizar Unidad Medida---------------------------------------------- */


}

?>