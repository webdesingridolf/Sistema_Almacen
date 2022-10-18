
<?php
include_once 'Models/V_Session.php';
class SessionModel extends Model{
    public function __construct(){
        parent::__construct();
    }
//-------------------------inicio login--------------------------------------------------------------------------------
    public function login($datos){
        $log_User=$datos["log_User"];
        $log_Pass=$datos["log_Pass"];
       $items=[];
       try {
            $query=$this->prepare("SELECT usuario.log_User, usuario.log_Pass,usuario.id_Usuario,usuario.Tipo_Usuario
            FROM usuario
            WHERE usuario.log_User= :log_User and usuario.log_Pass= :log_Pass");
            $query->execute(["log_User"=>$log_User,"log_Pass"=>$log_Pass]);
            $login=$query->fetch(PDO::FETCH_ASSOC); 
           
            return $login;
       } catch (PDOException $e){
            echo "falla de salida";
       }
        
    }
//-----------------------------------------fin login---------------------------------------------------------------

//------------------------------------inicio datos usuario-------------------------------------------------------------------------
    function DatosUsuario(){
        try {
            $query=$this->prepare("SELECT*FROM usuario
            WHERE id_Usuario=1");
            $query->execute();
            $ingresos=$query->fetch(PDO::FETCH_ASSOC);
            return $ingresos['id_Usuario'];
        
        } catch (PDOException $e) {
            
        }
    }
//-----------------------------------fin datos usuario----------------------------------------------------------
//----------------------------------ingresos -----------------------------------------------------------------
public function Ingresos(){
    try {
        $query=$this->prepare('SELECT count(*)  FROM ingreso');
        $query->execute();
        $ingresos=$query->fetch(PDO::FETCH_ASSOC);
        return $ingresos['count(*)'];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
//-----------------------------------Fin ingresos------------------------------------------------------------

//----------------------------------salidas -----------------------------------------------------------------
public function Salidas(){
try {
    $query=$this->prepare('SELECT count(*)  FROM salida');
    $query->execute();
    $salidas=$query->fetch(PDO::FETCH_ASSOC);
    return $salidas['count(*)'];
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}
}
//-----------------------------------Fin salidas------------------------------------------------------------

//----------------------------------Servicios -----------------------------------------------------------------
public function Servicios(){
try {
    $query=$this->prepare('SELECT count(*)  FROM usuario');
    $query->execute();
    $Servicios=$query->fetch(PDO::FETCH_ASSOC);
    return $Servicios['count(*)'];
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}
}
//-----------------------------------Fin Servicios------------------------------------------------------------

//----------------------------------Productos -----------------------------------------------------------------
public function Productos(){
try {
    $query=$this->prepare('SELECT count(*)  FROM producto');
    $query->execute();
    $Productos=$query->fetch(PDO::FETCH_ASSOC);
    return $Productos['count(*)'];
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}
}
//-----------------------------------Fin Productos------------------------------------------------------------

    

}

?>