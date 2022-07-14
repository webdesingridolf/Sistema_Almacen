
<?php
include_once 'Models/V_Session.php';
class UsuarioModel extends Model{
    public function __construct(){
        parent::__construct();
    }
//---------------------------------------insertar Usuario-------------------------------------------------------
    public function insertarUsuario($datos){
        
       
       try {
            $query = $this->prepare('INSERT INTO usuario (tipo_Documento,numero_Documento,nombre,apellido,fecha_Nacimiento,log_User,log_Pass,Tipo_Usuario)
             VALUES (:tipo_Documento, :numero_Documento, :nombre, :apellido, :fecha_Nacimiento, :log_User, :log_Pass,:Tipo_Usuario)');
            $query->execute([
                "tipo_Documento"=>$datos['Documento'], 
                "numero_Documento"=>$datos['NDocumento'], 
                "nombre"=>$datos['Nombre'], 
                "apellido"=>$datos['Apellido'], 
                "fecha_Nacimiento"=>$datos['FechaN'], 
                "log_User"=>$datos['Usuario'], 
                "log_Pass"=>$datos['Contraseña'],
                "Tipo_Usuario"=>$datos['TipoUsuario']
        ]);
        return true;
       } catch (PDOException $e){
        echo $e->getMessage();
        return FALSE;
       }
    }
//--------------------------------fin insertar usuario-------------------------------------------------------

/*----------------------------  eliminar usuario  ----------------------------------------------------------------------------------------------------*/
public function Eliminar($id){
    try {
        $query=$this->prepare('DELETE FROM usuario WHERE id_Usuario='.$id.'');
        $query->execute();
        return true;
        
    } catch (PDOException $e) {
       
        return false;
    }

}
/*---------------------------- fin  eliminar usuario  ----------------------------------------------------------------------------------------------------*/
//----------------------------------------Mostrar Usuarios--------------------------------------------------------------------------------
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
                $item->NDocumento=$usuario['numero_Documento'];
                $item->nombre=$usuario['nombre'];
                $item->apellido=$usuario['apellido'];
                $item->fechaNacimiento=$usuario['fecha_Nacimiento'];
                $item->user=$usuario['log_User'];
                $item->password=$usuario['log_Pass'];
                $item->FechaRegistro=$usuario['fecha_Registro'];
                $item->TipoUsuario=$usuario['Tipo_Usuario'];
                array_push($items,$item);

            }
            return $items;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
//------------------------------------------fin mostrar usuarios-----------------------------------------------------------------------------
    
/*------------------------------------------funcion actualizar salidas---------------------------------------------- */


    public function actualizar($datos){
        try {
            $query=$this->prepare('UPDATE usuario SET tipo_Documento=:TDocumento,numero_Documento=:NDocumento,nombre=:Nombre,apellido=:Apellido,fecha_Nacimiento=:fechaNacimiento,log_User=:Usuario,log_Pass=:Passwor,Tipo_Usuario=:TUsuario
            WHERE id_Usuario=:id');
            $query->execute([
                
                'TDocumento'=>$datos['TipoDocumento'],
                'NDocumento'=>$datos['NDocumento'],
                'Nombre'=>$datos['Nombre'],
                'Apellido'=>$datos['Apellido'],
                'fechaNacimiento'=>$datos['FechaNacimiento'],
                'Usuario'=>$datos['Usuario'],
                'Passwor'=>$datos['Passwor'],
                'TUsuario'=>$datos['TipoUsuario'],
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