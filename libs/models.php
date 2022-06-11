<?php 
/*include_once 'libs/iModel.php'*/
class Model{
    public function __construct(){
        $this->db=new Database();
    }
    function query($query){
        return $this->db->conect()->query($query);
    }
    function prepare($query){
        return $this->db->conect()->prepare($query);
    }

}
?>