
<?php
include_once 'Models/V_Session.php';
class SessionModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function login($datos){
        echo "modelo session";
        var_dump($datos);
        $log_User=$datos["log_Use"];
        $log_Pass=$datos["log_Pass"];

        echo "<br>".$log_User;
        echo $log_Pass;
       $items=[];
       try {
            $query=$this->prepare("SELECT usuario.log_User, usuario.log_Pass
            FROM usuario
            WHERE usuario.log_User= :log_User and usuario.log_Pass= :log_Pass");
            $query->execute(["log_User"=>$log_User,"log_Pass"=>$log_Pass]);
            //$query->bindParam(":log_User",);
            //$query->bindParam(":log_Pass",);
            //$stmt->execute();
            //var_dump($stmt);
            while ($row=$query->fetch()) {
                //var_dump($query);
                $item=new V_Session();
                $item->log_User=$row['log_User'];
                $item->log_Pass=$row['log_Pass'];
                //echo $row['log_User'];
                array_push($items,$item);

            }
            //var_dump($items);
            return $items;
       } catch (PDOException $e){
            echo "falla de salida";
       }
        
       
        

    }
    

}

?>