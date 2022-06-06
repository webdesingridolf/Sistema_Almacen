<?php 
    include_once("Views/Header.php")
?>

<!DOCTYPE html>
<html lang="en">
<title>Almacenes</title>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=BASE_URL?>assets/img/Logo_GRTPE.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php 
            include_once("Views/NavUsuario.php")
        ?>

        <div class="content-wrapper">
            <!-- pagina de  contenido -->
    
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Productos</h1>
                        </div>
       
                    </div>
                </div>
            </div>

            <section class="content">

                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                                    Nuevo Ingreso
                                </button>
                        </div>

                <div class="card-body">
                <!--Contenido de la pagina -->

                <div class="container-fluid">
                    <form method="post" class="container" action="<?php echo constant('BASE_URL'); ?>ingresos/RegistrarIngreso" >
                        
                        <div class="row">
                            <label class="col-md-2" for="">Producto</label>
                                <input type="text" name="producto" id=""  class="form-control col-md">
                            <label class="col-md-2" for="">Unidad de Medida</label>
                                <select class="form-control col-md" id="um" name="um" >
                                    <option value="">Unidad de medida</option>
                                        <?php foreach($this->mp as $row){
                                            $producto=new productos();
                                            $producto=$row;?>
                                    <option value="<?php echo $producto->idProducto ;?>"><?php echo $producto->detalle; ?></option>
                          

                                        <?php  } ?>
                                </select>
                            
                                            
                        </div>
                        <br>
                        <div class="row">
                            <label for=""  class="col-md-2">Almacen</label>
                                
                                <select class="form-control col-md" id="almacen" name="almacen" >
                                    <option value="">Seleccione</option>
                                        <?php foreach($this->me as $row){
                                        $especifica=new especifica();
                                        $especifica=$row;?>
                                    <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                        <?php  } ?>
                                </select>
                            <label for=""  class="col-md-2">Especifica</label>
                                <select class="form-control col-md" id="especifica" name="especifica" >
                                    <option value="">Seleccione</option>
                                        <?php foreach($this->me as $row){
                                        $especifica=new especifica();
                                        $especifica=$row;?>
                                    <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                        <?php  } ?>
                                </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Agregar ingreso</button>

                    </form>
                </div>
                <div>
                      
                    </div>
                
                </div>
            </div>
       

            </section>
    
   
        </div>






  <!-- footer  -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0-rc
            </div>
        </footer>

  
    </div>




</body>
</html>
<script>
$("#um").select2();
$("#almacen").select2();
$("#especifica").select2();

</script>


    <?php
        include_once("Views/Js.php");
    ?>