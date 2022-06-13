<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php 
    include_once("Views/Header.php")
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
    <title>Document</title>
</head>
<body class="nav-vertical">


    <div class="w-25 p-3 position-absolute top-50 start-50 translate-middle nav-white" >
<<<<<<< HEAD
        <form action="<?=BASE_URL?>Session/SessionConetion" method="get">
=======
        <form action="<?php echo constant('BASE_URL');?>session/SessionConetion" method="post">
>>>>>>> 255602f2c53c3ebfdabb7e4ae4300b7f9bd42040
        <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">User ID</label>    
                <input type="text" id="form2Example1" class="form-control" name="User" placeholder="Username"/>        
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2" ">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="Pass" placeholder="**********" />
                
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
                </div>

                <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Sign in</button>

            <!-- Register buttons -->
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
        </form>
    </div>
    
</body>
</html>
<?php
    //require "constant('BASE_URL')Controllers/Session.php";

    /*if (isset($_POST["Username"]) && isset($_POST["Password"])) {
       echo  $_POST["Username"]; 
       echo $_POST["Password"];
       $_SESSION[""];

       $session = new Session();
       $session -> SessionConetion(["Username"=>$_POST["Username"],"Password"=>$_POST["Password"]]);
    }*/
?>