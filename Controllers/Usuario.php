<?php
class Usuario extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Usuario/index');
      
    }
    function PerfilUsuario(){
        $this->view->render('Usuario/PerfilUsuario');
      
    }

    

    function RegistrarUsuario(){
        $Documento=$_POST['TipoDocumento'];
        $NDocumento=$_POST['NumeroDocumento'];
        $Nombre=$_POST['Nombre'];
        $Apellido=$_POST['Apellido'];
        $FechaN=$_POST['FechaNacimiento'];
        $Usuario=$_POST['Usuario'];
        $Contraseña=$_POST['Contraseña'];
        $TipoUsuario=$_POST['tipoUsuario'];


       
        if (
            $this->model->insertarUsuario([
                'Documento'=>$Documento,
                'NDocumento'=>$NDocumento,
                'Nombre'=>$Nombre,
                'Apellido'=>$Apellido,
                'FechaN'=>$FechaN,
                'Usuario'=>$Usuario,
                'Contraseña'=>$Contraseña,
                'TipoUsuario'=>$TipoUsuario,
    
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
            }
            echo json_encode($arrResponse);
        
    }

    function mostrar(){
        $usuario=$this->model->mostrarUsuario();
        //var_dump($usuario);
        print json_encode($usuario, JSON_UNESCAPED_UNICODE);
       

    }
    /*----------------Eliminar Servicio-------------------------------------------------------------------------------- */
    function EliminarUsuario(){
        $id=$_POST['id'];
        if ($this->model->Eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Usuario Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'El Usuario esta en uso, no puede ser Eliminado ');
            }
            echo json_encode($arrResponse);
        
       // print json_encode($id, JSON_UNESCAPED_UNICODE);
    }
/*----------------fin Eliminar Servicio-------------------------------------------------------------------------------- */
/*------------------------------  actualizar Usuario------------------------------------------------------------------*/

function ActualizarUsuario(){
    $upTDocumento=$_POST["upTipoDocumento"];
    $upNDocumento=$_POST["upNDocumento"];
    $upNombre=$_POST["upNombre"];
    $upApellido= $_POST["upApellido"];
    $upFechaNacimiento=$_POST["upFechaNacimiento"];
    $upTipoUsuario=$_POST["upTipoUsuario"];
    $upUsuario=$_POST["upUsuario"];
    $upContraseña=$_POST["upContraseña"];
    $upID=$_POST["upId"];
   
    
    if (
        $this->model->actualizar([
           
            'TipoDocumento'=>$upTDocumento,
            'NDocumento'=>$upNDocumento,
            'Nombre'=>$upNombre,
            'Apellido'=>$upApellido,
            'FechaNacimiento'=>$upFechaNacimiento,
            'TipoUsuario'=>$upTipoUsuario,
            'Usuario'=>$upUsuario,
            'Passwor'=>$upContraseña,
            'id'=>$upID,
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Usuario Actualizado correctamente');
   
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Usuario no Actualizado ');
            
        }
        echo json_encode($arrResponse);

}



/*------------------------------fin  actualizar usuarios ----------------------------------------------------------*/








}

?>