const compra = new Carrito();
const listaCompra = document.querySelector("#lista-compra tbody");
const carrito = document.getElementById('carrito');
const procesarCompraBtn = document.getElementById('procesar-compra');
const cliente = document.getElementById('cliente');
const correo = document.getElementById('correo');

cargarEventos();

function cargarEventos() {
    document.addEventListener('DOMContentLoaded', compra.leerLocalStorageCompra());

    //Eliminar productos del carrito
    carrito.addEventListener('click', (e) => { compra.eliminarProducto(e) });

    compra.calcularTotal();

    //cuando se selecciona procesar Compra
    procesarCompraBtn.addEventListener('click', procesarCompra);

    carrito.addEventListener('change', (e) => { compra.obtenerEvento(e) });
    carrito.addEventListener('keyup', (e) => { compra.obtenerEvento(e) });

}

function procesarCompra() {
    // e.preventDefault();
    LSProducto=localStorage.getItem('productos')
    productosLS = compra.obtenerProductosLocalStorage();
    productosLS.forEach(function (producto) {
         
    });

    
    parse=JSON.parse(LSProducto)

    
    document.getElementById('procesar-pago').addEventListener('submit', function (event) {
                event.preventDefault();
                json={'dato': JSON.stringify(LSProducto)}
                console.log(parse)
                $.ajax({
                    url: 'ProcesoCompra.php',
                    type: 'post',
                    data:  {'dato': JSON.stringify(parse)},
                    
                    success: function (r) {
                       console.log(r)
                       
                    }
                });
                
               
            });    
    
}
