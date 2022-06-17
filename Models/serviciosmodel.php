
<?php
include_once 'Models/servicios.php';
class ServiciosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        $TipoDocumento =$datos["TipoDocumento"];
        $NumeroDocumento =$datos["NumeroDocumento"];
        $Nombre =$datos["Nombre"];
        $Apellido =$datos["Apellido"];
        $FechaNacimiento =$datos["FechaNacimiento"];
        $Usuario= $datos["Usuario"];
        $Contraseña= $datos["Contraseña"];
       $items=[];
       try {
            $query = $this->prepare('INSERT INTO usuario (tipo_Documento,numero_Documento,nombre,apellido,fecha_Nacimiento,log_User,log_Pass)
             VALUES (:tipo_Documento, :numero_Documento, :nombre, :apellido, :fecha_Nacimiento, :log_User, :log_Pass)');
            $query->execute([
                "tipo_Documento"=>$TipoDocumento, 
                "numero_Documento"=>$NumeroDocumento, 
                "nombre"=>$Nombre, 
                "apellido"=>$Apellido, 
                "fecha_Nacimiento"=>$FechaNacimiento, 
                "log_User"=>$Usuario, 
                "log_Pass"=>$Contraseña
        ]);
       } catch (PDOException $e){
        echo $e->getMessage();
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
                $item->os=$servicio['O/S'];
                
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