
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
        try {
            $query=$this->prepare("SELECT * FROM usuario");
            $query->execute();
            
            var_dump($query->execute());
            return $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

}

?>