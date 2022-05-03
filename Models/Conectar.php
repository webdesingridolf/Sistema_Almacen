<?php
    include_once "../Controladores/config.php";
    class Conexiondb{
    
        public function Conectar(){
    
            try {
                //$Conex= new PDO("mysql:host=localhost;dbname=ventasweb", "root", "");
                $Conexion= new PDO("mysql:host=".servidor.";dbname=".nombre_bd , usuario , password);
                $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //var_dump($Conexion);
                return $Conexion;
                ECHO "conexion realizada ";
            } catch (PDOException $e) {
                echo "conexion fallida: ".$e->getMessage();
                try {//CREACION DE BASE DE DATOS CON PHP
                    $Conexion= NEW PDO("mysql:host=".servidor , usuario , password);
                    $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql="CREATE DATABASE IF NOT EXISTS ".nombre_bd;//CREACION DE BASE DE DATOS
                    $Conexion->exec($sql);
                    echo "conexion realizada 2";
                } catch (PDOException $a) {
                    echo "conexion fallada 2". $a->getMessage();
                }   
            }
        }
    }
    
    
?>
