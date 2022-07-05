


<?php 
    include_once("Views/Header.php")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=BASE_URL?>assets/img/Logo_GRTPE.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Inicio de Sesion</title>
</head>
<body class="nav-vertical">


    <div class="w-25 p-3 position-absolute top-50 start-50 translate-middle nav-white" >
        <form action="<?=BASE_URL?>Session/SessionConetion" method="post">
        <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Usuario</label>    
                <input type="text" id="form2Example1" class="form-control" name="User" placeholder="nombre de usuario"/>        
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2" >Contraseña</label>
                <input type="password" id="form2Example2" class="form-control" name="Pass" placeholder="**********" />
                
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Iniciar Sesion</button>

            <!-- Register buttons 
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1 ">
                <i class="fab fa-github"></i>
                </button>
            </div>
            -->
        </form>
    </div>
    
</body>
</html>
<?php
    include_once("Views/Js.php");
?>
