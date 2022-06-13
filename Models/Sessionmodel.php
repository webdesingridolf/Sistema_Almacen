
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
            $query=$this->prepare("SELECT usuario.log_User, usuario.log_Pass
            FROM usuario
            WHERE usuario.log_User= :log_User and usuario.log_Pass= :log_Pass");
            $query->execute(["log_User"=>$log_User,"log_Pass"=>$log_Pass]);
            while ($row=$query->fetch()) {
                $item=new V_Session();
                $item->log_User=$row['log_User'];
                $item->log_Pass=$row['log_Pass'];
                
                array_push($items,$item);

            }
            
            return $items;
       } catch (PDOException $e){
            echo "falla de salida";
       }
        
       
        

    }
    

}

?>