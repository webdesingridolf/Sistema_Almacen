<?php
include_once "../Controladores/SessionControlador.php";

$controlador = new SessionControlador();
$controlador->IniciarSession("6","123");
if (isset($_SESSION['usuario'])) {
    echo "si existe usuario Sesion : ".$_SESSION['usuario'];    
}
else{
    echo "no exite usuario : ";
}
?>

<input type="button" id="btn" value="Cerrar Session" onclick="boton()">
<p id="pa">paquiro</p>
<script>
    function boton() {
        //var botn = documet.getElementById("btn").value;
        document.getElementById("pa").style.color ="red";
        document.getElementById("pa").innerHTML = "estoy de ka made";
        var session=document.getElementById("btn").value;
        console.log(document.getElementById("btn").value);
        //sentencia de cambiar nombre
        if(session==="Iniciar Session"){
            session=document.getElementById("btn").value="Cerrar Session";
            document.getElementById("pa").style.background ="yellow";
        }else if(session==="Cerrar Session") {
            session=document.getElementById("btn").value="Iniciar Session";
            document.getElementById("pa").style.background ="black";
        }{

        }
    }


</script>