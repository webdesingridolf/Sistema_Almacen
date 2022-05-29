<form class="container" action="<?php echo constant('BASE_URL'); ?>ingresos/RegistrarIngreso" method="POST">
                        
                        <div class="row">
                        <label class="col-md-1" for="">Producto</label>
                        <select class="form-control col-md" id="buscador" >
                            <option selected="selected">orange</option>
                            <option>white</option>
                            <option>purple</option>
                        </select>
                        <label class="col-md-1" for="">Cantidad</label>
                        <input type="number" name="" id="" class="col-md-1">
                        <label class="col-md-1" for="">Precio</label>
                        <input type="number" name="" id="" class="col-md-1">
                        <label class="col-md-1" for="">Total</label>
                        <input type="number" name="" id="" class="col-md-1">
                        </div>
                        <br>
                        <div class="row">
                            <label for=""  class="col-md-2">Orden de compra</label>
                            <input type="text"  class="col-md-3">
                            <label for=""  class="col-md-2">Especifica</label>
                            <select class="form-control col-md" id="buscador2" >
                            <option selected="selected">orange</option>
                            <option>white</option>
                            <option>purple</option>
                        </select>
                      
                        


                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Agregar ingreso</button>

                    </form>