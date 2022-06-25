
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
            $query=$this->prepare("SELECT usuario.log_User, usuario.log_Pass,usuario.id_Usuario
            FROM usuario
            WHERE usuario.log_User= :log_User and usuario.log_Pass= :log_Pass");
            $query->execute(["log_User"=>$log_User,"log_Pass"=>$log_Pass]);
            $ingresos=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($ingresos as $ingreso){
                $item=new V_Session();
                $item->log_User=$ingreso['log_User'];
                $item->log_Pass=$ingreso['log_Pass'];
                $item->id=$ingreso['id_Usuario'];

                
                array_push($items,$item);
            }
            
            
            $id=1;
            return $items;
       } catch (PDOException $e){
            echo "falla de salida";
       }
        
       
        

    }
    

}

?>