<?php
    include "Conexion.php";
    class ModeloUsuario{

        public $tipo_Docmento = "" ;
        public $numero_Documento = 0 ;
        public $nombre = "";
        public $apellido = "" ;
        public $fecha_Nacimiento = "" ;
        public $log_User = "";
        public $log_Pass = "";
        /*crud*/ 
        private function CrearUsuario($tipo_Docmento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass){
            $con= new Conexion();
            $conexion = $con->conexionBD();
            $sql = "INSERT INTO usuario(tipo_Documento,numero_Documento,nombre,apellido,fecha_Nacimiento,log_User,log_Pass) 
            VALUES(:tipo_Documento,:numero_Documento,:nombre,:apellido,:fecha_Nacimiento,:log_User,:log_Pass)";
            /*$sql = "INSERT INTO usuario(tipo_Documento,numero_Documento,nombre,apellido,fecha_Nacimiento,log_User,log_Pass) 
            VALUES($tipo_Docmento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass)";*/
            $stm = $conexion->prepare($sql);
            $stm->bindParam(':tipo_Documento',$tipo_Docmento);
            $stm->bindParam(':numero_Documento',$numero_Documento);
            $stm->bindParam(':nombre',$nombre);
            $stm->bindParam(':apellido',$apellido);
            $stm->bindParam(':fecha_Nacimiento',$fecha_Nacimiento);
            $stm->bindParam(':log_User',$log_User);
            $stm->bindParam(':log_Pass',$log_Pass);
            $stm->execute();
        }

        private function ReedUsuario(){
            $con= new Conexion();
            $conexion = $con->conexionBD();
            $sql="SELECT * FROM usuario";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt;   
        }
        private function UpUsuario($tipo_Documento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass, $id_Usuario){
            $con= new Conexion();
            $conexion = $con->conexionBD();
            $sql="UPDATE usuario SET tipo_Documento=$tipo_Documento, numero_Documento=$numero_Documento, nombre=$nombre, apellido=$apellido, fecha_Nacimiento=$fecha_Nacimiento, log_User=$log_User, log_Pass=$log_Pass WHERE id_Usuario= $id_Usuario ";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();

        }
        private function DeleteUsuario($id_Usuario){
            $con= new Conexion();
            $conexion = $con->conexionBD();
            $sql="DELETE FROM usuario WHERE id_Usuario = $id_Usuario";
            $stmt= $conexion->prepare($sql);
            $stmt->execute();
        }

        public function Crear_Usuario($tipo_Documento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass){
            $ModeloUsuario = new ModeloUsuario();
            $ModeloUsuario->CrearUsuario($tipo_Documento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass);
        }

        public function Reed_Usuario(){
            $ModeloUsuario = new ModeloUsuario();
            return $ModeloUsuario->ReedUsuario();

        }
        public function Up_Usuario($tipo_Documento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass, $id_Usuario){
            $ModeloUsuario = new ModeloUsuario();
            $ModeloUsuario->UpUsuario($tipo_Documento,$numero_Documento,$nombre,$apellido,$fecha_Nacimiento,$log_User,$log_Pass, $id_Usuario);
        }
        public function Delete_Usuario($id_Usuario){
            $ModeloUsuario = new ModeloUsuario();
            $ModeloUsuario->DeleteUsuario($id_Usuario);
        }

    }

    $in = new ModeloUsuario();
    //$in->CrearUsuario("1","2","3","4",1,"6","7");
    //$in->Crear_Usuario("1","2","3","4",date("22-9-2"),"6","7");
    /*$mostrar = $in->Reed_Usuario();
    var_dump($mostrar); 
    foreach ($mostrar->fetchAll() as $key => $value) {
        echo $value["nombre"]."</br>" ;
    }*/
    //$in->Up_Usuario("4","4","4","4",DATE('1998-01-04'),"4","4",2);
    //$in->Delete_Usuario(18);
    
?>

