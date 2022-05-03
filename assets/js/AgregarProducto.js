document.getElementById("Imagen").addEventListener("change", () => {
    var archivoseleccionado = document.querySelector("#Imagen");
    var archivos = archivoseleccionado.files;
    var imagenPrevisualizacion = document.querySelector("#mostrarimagen");
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




function Registrar() {
    var nombre = $("#Nombre").val();
    var detalle = $("#Detalle").val();
    var precio = $("#Precio").val();
    var stock = $("#Stock").val();
    var imagen = $("#Imagen").val();
    var categoria = $("#Categoria").val();

    var formData = new FormData();
    var foto = $("#Imagen")[0].files[0];
    formData.append('n', nombre);
    formData.append('d', detalle);
    formData.append('p', precio);
    formData.append('s', stock);
    formData.append('c', categoria);
    formData.append('f', foto);




    $.ajax({
        url: 'AgregarProducto.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            if (respuesta = 1) {


                document.getElementById("formulario").reset();
                
                document.getElementById("mostrarimagen").style.display = "none";

                $('#contenedortabla').load('../Vistas/Inventario.php #tabla_productos');

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
    alertify.confirm("Eliminar Producto","¿Esta seguro de eliminar este producto?",
    function () {
        eliminar(id)
        
    },
    function () {
        alertify.error('Cancelar');
    });
}


function eliminar(id) {
    var formid = new FormData();
    formid.append('id', id);
    $.ajax({
        url: 'Eliminar.php',
        type: 'post',
        data: formid,
        contentType: false,
        processData: false,
        success: function (r) {
            if(r==1){
                $('#contenedortabla').load('../Vistas/Inventario.php #tabla_productos');
                alertify.success('Eliminado con exito');

            }else{
                alertify.error('Error al eliminar el producto');

            }
           
        }
    });
    return false;

   
}



