<?php
class Database{
    private $servidor;
    private $db;
    private $usuario;
    private $contraseña;
    public function __construct(){
        $this->servidor=constant('servidor');
        $this->db=constant('db');
        $this->usuario=constant('usuario');
        $this->contraseña=constant('contraseña');
    }
    public function conect(){
        try {
            $conexion="mysql:host=".$this->servidor.";dbname=".$this->db;
            $options=   [
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES =>false,
            ];
            $pdo=new PDO($conexion,$this->usuario,$this->contraseña);	
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: '.$e->getMessage());
        }
       
    }
}

?>