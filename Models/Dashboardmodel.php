<?php

class DashboardModel extends Model{
    public function __construct(){
        parent::__construct();
    }
//----------------------------------ingresos -----------------------------------------------------------------
    public function Ingresos(){
        try {
            $query=$this->prepare('SELECT count(*)  FROM ingreso');
            $query->execute();
            $ingresos=$query->fetch(PDO::FETCH_ASSOC);
            return $ingresos['count(*)'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
//-----------------------------------Fin ingresos------------------------------------------------------------

//----------------------------------salidas -----------------------------------------------------------------
public function Salidas(){
    try {
        $query=$this->prepare('SELECT count(*)  FROM salida');
        $query->execute();
        $salidas=$query->fetch(PDO::FETCH_ASSOC);
        return $salidas['count(*)'];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
//-----------------------------------Fin salidas------------------------------------------------------------

//----------------------------------Servicios -----------------------------------------------------------------
public function Servicios(){
    try {
        $query=$this->prepare('SELECT count(*)  FROM usuario');
        $query->execute();
        $Servicios=$query->fetch(PDO::FETCH_ASSOC);
        return $Servicios['count(*)'];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
//-----------------------------------Fin Servicios------------------------------------------------------------

//----------------------------------Productos -----------------------------------------------------------------
public function Productos(){
    try {
        $query=$this->prepare('SELECT count(*)  FROM producto');
        $query->execute();
        $Productos=$query->fetch(PDO::FETCH_ASSOC);
        return $Productos['count(*)'];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
//-----------------------------------Fin Productos------------------------------------------------------------

}

?>