function Agregar() {
    var nombre = $("#Nombre").val();
    var formData = new FormData();
    formData.append('n', nombre);
 
    $.ajax({
        url: 'AgregarCategoria.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            if (respuesta = 1) {


                document.getElementById("formAgregar").reset();
                

                $('#contenedortabla').load('../Vistas/categorias.php #tabla_categorias');

                alertify.success('Producto Agregado con exito');
                

            }
            else{
                alertify.error('Error al insertar nuevo producto');

            }
        }
    });
    return false;
}

function Preguntar(id) {
    alertify.confirm("Eliminar Categoria","¿Esta seguro de eliminar esta categoria?",
    function () {
        eliminar(id)
        
    },
    function () {
        alertify.error('Cancelar');
    });
}
function Eliminar(id) {
    var formid = new FormData();
    formid.append('id', id);
    $.ajax({
        url: 'EliminarCategoria.php',
        type: 'post',
        data: formid,
        contentType: false,
        processData: false,
        success: function (r) {
            if(r==1){
                $('#contenedortabla').load('../Vistas/categorias.php #tabla_categorias');
                alertify.success('Eliminado con exito');

            }else{
                alertify.error('Error al eliminar el producto');

            }
           
        }
    });
    return false;
}

function CargarDatos(datos) {

    d=datos.split("||");
    id=d[0]
    $('#UpName').val(d[1]);
   
    $('#UpId').val(d[0]);

}

function Actualizar() {
    var nombre = $("#UpName").val();
    var id = $("#UpId").val();

    var formData = new FormData();
    formData.append('n', nombre);
    formData.append('id', id);

    $.ajax({
        url: 'ActualizarCategoria.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (respuesta) {
      
            if (respuesta = 1) {


                document.getElementById("UpdateForm").reset();
                

                $('#contenedortabla').load('../Vistas/categorias.php #tabla_categorias');

                alertify.success('Producto Actualizado con exito');
                

            }
            else
            {
                alertify.error('Error al Actualizar el producto');

            }
                

        }
    });
    return false;

    
}