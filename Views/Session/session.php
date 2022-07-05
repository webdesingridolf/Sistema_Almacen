<?php 
    include_once("Views/Header.php")
?>

<!DOCTYPE html>
<html lang="en">
<title>Login</title>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="w-25 p-3 position-absolute top-50 start-50 translate-middle nav-white" >
            <form action="<?=BASE_URL?>Session/SessionConetion" method="post">
            <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Usuario</label>    
                    <input type="text" id="form2Example1" class="form-control" name="User" placeholder="Username"/>        
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2" ">Contraseña</label>
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

        

       







 

  
    </div>




</body>
</html>

    <?php
        include_once("Views/Js.php");
    ?>