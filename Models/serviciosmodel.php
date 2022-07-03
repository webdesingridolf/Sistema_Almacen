
<?php
include_once 'Models/servicios.php';
class ServiciosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
/*---------------------------- funcion insertar servicios  ----------------------------------------------------------------------------------------------------*/
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
/*----------------------------fin  funcion insertar servicios   ----------------------------------------------------------------------------------------------------*/
/*---------------------------- funcion eliminar servicios  ----------------------------------------------------------------------------------------------------*/
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
/*---------------------------- fin funcion eliminar servicios  ----------------------------------------------------------------------------------------------------*/

/*---------------------------- funcion mostrar servicios  ----------------------------------------------------------------------------------------------------*/
    public function Mostrar($fechaA,$fechaS){
        $items=[];
        try {

            $servicios=[];
            $query=$this->prepare("SELECT servicio.id_Servicio,servicio.fecha,servicio.detalle,servicio.cantidad,especifica.detalle_Especifica,servicio.precio,servicio.total,servicio.O_S,servicio.id_Especifica 
            FROM servicio,especifica 
            WHERE servicio.id_Especifica=especifica.id_Especifica AND servicio.fecha BETWEEN "."'".$fechaA."'"."AND "."'".$fechaS."'"."");
            $query->execute();
            $servicios=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($servicios as $servicio){
                $item=new ListaServicios();
                $item->id=$servicio['id_Servicio'];
                $item->fecha=$servicio['fecha'];
                $item->detalle=$servicio['detalle'];
                $item->cantidad=$servicio['cantidad'];
                $item->Especifica=$servicio['detalle_Especifica'];
                $item->precio=$servicio['precio'];
                $item->total=$servicio['total'];
                $item->os=$servicio['O_S'];
                $item->EspecificaID=$servicio['id_Especifica'];

                
                
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
/*---------------------------- fin funcion mostrar servicios  ----------------------------------------------------------------------------------------------------*/

/*---------------------------- funcion mostrar servicios  ----------------------------------------------------------------------------------------------------*/
public function MostrarLista(){
    $items=[];
    try {

        $servicios=[];
        $query=$this->prepare("SELECT servicio.id_Servicio,servicio.fecha,servicio.detalle,servicio.cantidad,especifica.detalle_Especifica,servicio.precio,servicio.total,servicio.O_S,servicio.id_Especifica 
        FROM servicio,especifica 
        WHERE servicio.id_Especifica=especifica.id_Especifica ");
        $query->execute();
        $servicios=$query->fetchAll(PDO::FETCH_ASSOC);
        foreach($servicios as $servicio){
            $item=new ListaServicios();
            $item->id=$servicio['id_Servicio'];
            $item->fecha=$servicio['fecha'];
            $item->detalle=$servicio['detalle'];
            $item->cantidad=$servicio['cantidad'];
            $item->Especifica=$servicio['detalle_Especifica'];
            $item->precio=$servicio['precio'];
            $item->total=$servicio['total'];
            $item->os=$servicio['O_S'];
            $item->EspecificaID=$servicio['id_Especifica'];

            
            
            array_push($items,$item);

        }
        return $items;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
/*---------------------------- fin funcion mostrar servicios  ----------------------------------------------------------------------------------------------------*/




/*---------------------------- funcion mostrar especifica  ----------------------------------------------------------------------------------------------------*/
    public function MostrarEspecifica(){
        $items=[];
        try {
            $mEspecificas=[];
            $query=$this->prepare("SELECT*FROM especifica");
            $query->execute();
            $mEspecificas=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mEspecificas as $mEspecifica) {
                $item=new especifica();
                $item->idEspecifica=$mEspecifica['id_Especifica'];
                $item->detalle=$mEspecifica['codigo'];
            
                array_push($items,$item);
            }
             return $items;
        } catch (PDOException $e) {
            return [];
        }
        
    }
/*---------------------------- fin funcion mostrar especifica  ----------------------------------------------------------------------------------------------------*/
/*------------------------------------------funcion actualizar salidas---------------------------------------------- */


public function actualizar($datos){
    try {
        $query=$this->prepare('UPDATE servicio SET detalle=:detalle,cantidad=:cantidad,precio=:precio,total=:total,O_S=:os,id_Especifica=:especifica
        WHERE id_Servicio=:id');
        $query->execute([
            
            'cantidad'=>$datos['cantidad'],
            'detalle'=>$datos['detalle'],
            'precio'=>$datos['precio'],
            'total'=>$datos['total'],
            'os'=>$datos['os'],
            'especifica'=>$datos['especifica'],
            'id'=>$datos['id'],
            
            

        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        //echo "ingreso existente ";
        return false;
    }
}




/*------------------------------------------fin funcion actualizar salidas---------------------------------------------- */


}

?>