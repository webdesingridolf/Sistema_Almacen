
<?php
include_once 'Models/V_Session.php';
class HistorialIngresosModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function Session($log_User,$log_Pass){
       $items=[];
       try {
           $query=$this->db->conect()->query("SELECT usuario.log_User, usuario.log_Pass
           FROM usuario
           WHERE usuario.log_User= $log_User and usuario.log_Pass= $log_Pass");
            while ($row=$query->fetch()) {
                $item=new V_Session();
                $item->log_User=$row['log_User'];
                $item->log_Pass=$row['$log_Pass'];
                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);

            }
            return $items;
       } catch (PDOException $e) {
           return [];
       }
        
       
        

    }
    

}

?>