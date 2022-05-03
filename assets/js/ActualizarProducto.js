document.getElementById("UpImage").addEventListener("change", () => {
    var archivoseleccionado = document.querySelector("#UpImage");
    var archivos = archivoseleccionado.files;
    var imagenPrevisualizacion = document.querySelector("#mostrarimage");
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
        imagenPrevisualizacion.src = "";
        return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    var primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    var objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagenPrevisualizacion.src = objectURL;

});
function CargarDatos(datos) {

    d=datos.split("||");
    id=d[0]
    $('#UpName').val(d[1]);
    $('#UpDetalle').val(d[3]);
    $('#UpPrecio').val(d[4]);
    $('#UpCategoria').val(d[2]);
    $('#UpStock').val(d[5]);
    $('#UpId').val(d[0]);

}
function Actualizar() {
    var nombre = $("#UpName").val();
    var detalle = $("#UpDetalle").val();
    var precio = $("#UpPrecio").val();
    var stock = $("#UpStock").val();
    var imagen = $("#UpImagen").val();
    var categoria = $("#UpCategoria").val();
    var id = $("#UpId").val();

    

    var formData = new FormData();
    var foto = $("#UpImage")[0].files[0];
    formData.append('n', nombre);
    formData.append('d', detalle);
    formData.append('p', precio);
    formData.append('s', stock);
    formData.append('c', categoria);
    formData.append('f', foto);
    formData.append('i', id);





    $.ajax({
        url: 'ActualizarProducto.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (respuesta) {
      
            if (respuesta = 1) {


                document.getElementById("UpdateForm").reset();
                
                document.getElementById("mostrarimage").style.display = "none";

                $('#contenedortabla').load('../Vistas/Inventario.php #tabla_productos');

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
   