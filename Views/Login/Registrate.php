<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Session.css">
    <title>Registrate</title>
</head>
<body>
    <form action="" method="post">
        <label for="">IdUsuario</label>
        <input type="text" name="usuario" id="" placeholder="IdEjemplo"><br>
        <label for="">Password</label>
        <input type="password" name="pasword" id="" placeholder=" ***********"><br>
        <label for="">'E - Mail'</label>
        <input type="text" name="e_mail" id="" placeholder="Ejemplo@gmail.com"><br>
        <input type="submit" value="Registrar"><br>
        <p>Haga click en el enlase si ya tiene <br> una cuenta 
            <a href="Session.php">Login</a></p>
    </form>
</body>
</html>
<?php
if (isset($_POST["usuario"]) and isset($_POST["pasword"]) and isset($_POST["e_mail"])) {
    include_once "../Modelo/CRUDUsuario.php";
    $Modelo = NEW CRUDUsuario();
    $Modelo->InsertUsuario($_POST["usuario"], $_POST["pasword"],$_POST["e_mail"]);
    header("Session.php");
}
?>