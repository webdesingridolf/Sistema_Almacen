<?php
class CRUDUsuario{
    //require_once("Conectar.php"):
    
    public function SelectUsuario(){//funciona
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $sql="SELECT * FROM vw_usuario";
        $stmt = $conexion->Conectar()->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $key => $value) {
            var_dump($value);
            echo"</br>";
            //print($value[1]);
            //print_r($value[1]);
        }
    }

    public function UpdateUsuario($pasword, $id){//funciona
        require_once("Conectar.php");
        $Conexion = new Conexiondb();

        $sql= " UPDATE vw_usuario SET pasword=? WHERE id=?";
        $stmt=$Conexion->Conectar()->prepare($sql);

        $stmt->bindParam(1, $pasword);
        $stmt->bindParam(2, $id );
        
        $stmt->execute();
        echo"cambiado".$pasword, $id;
    } 
    
    public function InsertUsuario($usuario, $pasword, $e_mail){//funciona
        require_once("Conectar.php");
        $Conexion = new Conexiondb();

        $sql= " INSERT INTO vw_usuario (usuario, pasword, e_mail) VALUES(?,?,?) ";
        $stmt=$Conexion->Conectar()->prepare($sql);

        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $pasword);
        $stmt->bindParam(3, $e_mail);
        
        $stmt->execute();
    }

    public function DeleteUsuario($id){
        require_once("Conectar.php");
        $Conexion = new Conexiondb();
        $sql = "DELETE FROM vw_usuario WHERE id=?";
        
        $stmt = $Conexion->Conectar()->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

    }


    public function SelectUnUsuario($usuario,$pasword){//funciona
        require_once("Conectar.php");
        $Conexion = new Conexiondb();
        $sql = "SELECT * FROM vw_usuario WHERE usuario=BINARY? and pasword=?";
        $stmt = $Conexion->Conectar()->prepare($sql);
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $pasword);
        $stmt->execute();

            return $stmt->fetchAll();    
    
        /*$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $key => $value) {
            var_dump($value);
            //echo $value;
        }*/

    }
}