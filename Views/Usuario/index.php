<?php 
    include_once("Views/Header.php")
?>

<!DOCTYPE html>
<html lang="en">
<title>Usuario</title>
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
                            <h1 class="m-0">Usuario</h1>
                        </div>
       
                    </div>
                </div>
            </div>

            <section class="content">

                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                                
                               
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                Nuevo Usuario
                                </button>
                
                        </div>

                <div class="card-body">
                <!--Contenido de la pagina -->
                
                

                <div class="card-body" id="TablaIngresos">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tipo de Documento</th>
                    <th>Numero Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Usuario</th>
                    <th>contraseña</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
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
                        <?php 
                        //echo $this->mensaje;
                        
                        ?>
                    </div>
                
                </div>
            </div>
       

            </section>
    
   
        </div>
        



        
        <!-- /.modal-dialog -->




        <!--final del div incial-->
      </div>



        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=BASE_URL?>Usuario/Guardar" method="Post" >
            <div class="modal-body"> <!--body Modal -->
                
                    <div class="form-group row">
                        <label for="TipoDocumento" class="col-sm-5 col-form-label">Tipo de Documento</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" required name="TipoDocumento" id="TipoDocumento" placeholder="tipo de Documento">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NumeroDocumento" class="col-sm-5 col-form-label">Numero de Documento</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" required name="NumeroDocumento" id="NumeroDocumento" placeholder="Numero de Documento">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Nombre" class="col-sm-5 col-form-label">Nombre</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" required name="Nombre" id="Nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Apellido" class="col-sm-5 col-form-label">Apellido</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" required name="Apellido" id="Apellido" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="FechaNacimiento" class="col-sm-5 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-6">
                        <input type="date" class="form-control" required name="FechaNacimiento" id="FechaNacimiento" placeholder=>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Usuario" class="col-sm-5 col-form-label">Usuario</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" required name="Usuario" id="Usuario" placeholder="Usuario" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Contraseña" class="col-sm-5 col-form-label">Contraseña</label>
                        <div class="col-sm-6">
                        <input type="password" class="form-control" required name="Contraseña" id="Contraseña" placeholder="Contraseña" >
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            </form>
        </div>
        </div>

      <!--final del div incial

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registrar Nuevo Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form  class="container" id="frmIngresos" >
                  
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