
<?php
include_once 'Models/V_Session.php';
class SessionModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function login($datos){
        echo "modelo session";
        var_dump($datos);
       
       /* $items=[];
       try {
           $query=$this->query("SELECT usuario.log_User, usuario.log_Pass
           FROM usuario
           WHERE usuario.log_User= $log_User and usuario.log_Pass= $log_Pass");
           /*$query->bindParam(":log_User",);
           $query->bindParam(":log_Pass",);*/
            while ($row=$query->fetch()) {
                $item=new V_Session();
                $item->log_User=$row['log_User'];
                $item->log_Pass=$row['log_Pass'];
                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);

            }
            return $items;
       } catch (PDOException $e) {
           return [];
       }*/
        
       
        

    }
    

}

?>