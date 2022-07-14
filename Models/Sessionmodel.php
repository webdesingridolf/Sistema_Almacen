
<?php
include_once 'Models/V_Session.php';
class SessionModel extends Model{
    public function __construct(){
        parent::__construct();
    }
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
    

}

?>