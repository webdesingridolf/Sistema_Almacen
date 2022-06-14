
<?php
include_once 'Models/V_Session.php';
class UsuarioModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertarUsuario($datos){
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


    public function mostrarUsuario(){
        $items=[];
        try {

            $usuarios=[];
            $query=$this->prepare("SELECT * FROM usuario");
            $query->execute();
            $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($usuarios as $usuario){
                $item=new mUsuario();
                $item->id=$usuario['id_Usuario'];
                $item->TDocumento=$usuario['tipo_Documento'];
                $item->NDocmuento=$usuario['numero_Documento'];
                $item->nombre=$usuario['nombre'];
                $item->apellido=$usuario['apellido'];
                $item->fechaNacimiento=$usuario['fecha_Nacimiento'];
                $item->user=$usuario['log_User'];
                $item->password=$usuario['log_Pass'];
                $item->FechaRegistro=$usuario['fecha_Registro'];
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

}

?>