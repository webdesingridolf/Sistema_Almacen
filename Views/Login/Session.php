<?php
    include_once("../../config/config.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/Session.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <img src="" alt="img"></br>
        <label for="usuario">IdUsuario</label>   
        <input type="text" name="usuario" id=""> <br>
        <label for="pasword">Password</label>
        <input type="text" name="pasword" id=""> <br>
        <input type="submit" value="Ingresar">
        <p>registrese aqui <a href="Registrate.php">registrate</a></p>
        
    </form>
</body>
</html>
<?php
    //validacion sesion
    require_once ("../../Controllers/SessionControlador.php");
    session_start();
    if (isset($_SESSION['usuario'])) {
        //echo "si existe usuario Sesion : ".$_SESSION['usuario'];
        header("location: inicio.php");
    }
    else{
        //echo "no exite usuario : ";
    }
    //session_unset();
    //validacion usuario
    if(isset($_POST["usuario"]) and isset($_POST["pasword"])){
        $controlador = new SessionControlador();
        $controlador->IniciarSession($_POST["usuario"],$_POST["pasword"]);
        if (isset($_SESSION['usuario'])) {
            //echo "si existe usuario Sesion : ".$_SESSION['usuario'];
            header("location: Admin.php");    
        }
        else{
            //echo "no exite usuario : ";
        }
    }
?>