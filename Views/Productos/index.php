<?php 
    include_once("Views/Header.php")
?>

<!DOCTYPE html>
<html lang="en">
<title>Productos</title>
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
                                
                               
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                Nuevo Producto
                                </button>
                
                        </div>

                <div class="card-body">
                <!--Contenido de la pagina -->
                
                

                <div class="card-body" id="TablaIngresos">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Detalle</th>
                    <th>Unidad de Medida</th>
                    <th>Stock</th>
                    <th>Almacen</th>
                    <th>Especifica</th>
                    <th>Fecha de Registro </th>
                    <th>Acciones </th>
                  </tr>
                  </thead>
                  <tbody id="example2">
                   
                 

                  </tbody>
                  <!--<tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>-->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div> 
            </div>
       

                <div class="container-fluid">
                    
                </div>
                <div>
                        
                    </div>
                
                </div>
            </div>
       

            </section>
    
   
        </div>
        



        
        <!-- /.modal-dialog -->




        <!--final del div incial-->
      </div>
      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registrar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form  class="container" id="frmIngresos" >
                        
                        <div class="row">
                        <label class="col-md-1" for="">Detalle</label>
                                <input type="text" name="cantidad" id="cantidad"  class="col-md" >
                            <label class="col-md-1" for="">Unidad de Medida</label>
                                <select class=" col-md" id="producto" name="producto" >
                                    <option value="">Seleccione </option>
                                        <?php foreach($this->mp as $row){
                                            $producto=new productos();
                                            $producto=$row;?>
                                    <option value="<?php echo $producto->idProducto ;?>"><?php echo $producto->detalle; ?></option>
                          

                                        <?php  } ?>
                                </select>
                            
                            <label class="col-md-1" for="">Stock</label>
                                <input type="number" name="precio" id="precio" class="col-md-1" min="1"> 
                            
                        </div>
                        <br>
                        <div class="row">
                            
                            <label for=""  class="col-md-2">Especifica</label>
                                <select class=" col-md-3" id="especifica" name="especifica" >
                                    <option value="Default" >Seleccione</option>
                                        <?php foreach($this->me as $row){
                                        $especifica=new especifica();
                                        $especifica=$row;?>
                                    <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                        <?php  } ?>
                                </select>
                                <label for=""  class="col-md-2">Almacen</label>
                                <select class=" col-md-3" id="especifica" name="especifica" >
                                    <option value="Default" >Seleccione</option>
                                        <?php foreach($this->me as $row){
                                        $especifica=new especifica();
                                        $especifica=$row;?>
                                    <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                        <?php  } ?>
                                </select>
                        </div>
                        <br>
                        
                        

                   
              

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              
              <button type="" class="btn btn-primary toastrDefaultSuccess">
                        Registrar ingreso
                </button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
   $("#producto").select2({
        placeholder: 'Seleccione un producto'
    });
    $("#especifica").select2({
        placeholder: 'Seleccione una opcion'
    });
    
    
    
    
  
  
  
</script>


    <?php
        include_once("Views/Js.php");
    ?>
<script src="<?=BASE_URL?>assets/js/AgregarIngreso.js"></script>