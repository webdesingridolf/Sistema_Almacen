$(document).ready(function(){
//---------------------------------------Cargar datos-----------------------------------------------------------
    let base_url="/Sistema_Almacen/";
    tablaUsuarios=$('#example1').DataTable({ 
        "responsive": true, "lengthChange": false, "autoWidth": false,       
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ],
        "ajax":{            
            "url": base_url+"Usuario/mostrar", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
          
            {"data": "TDocumento"},
            {"data": "NDocumento"},
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "TipoUsuario"},
            {"data": "user"},
            {"data": "password"},
            {"data": "fechaNacimiento"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });
//-----------------------fin Cargar datos--------------------------------------------------------------------------------------------------------
   
//------------------------Registrar usuario------------------------------------------------------------------------------
    if (document.querySelector("#frmUsuarios")) {
   
        let base_url="/Sistema_Almacen/";
        let frmUsuarios=document.querySelector("#frmUsuarios");
        frmUsuarios.onsubmit=function(e){
            e.preventDefault();
            fntGuardar();
        }
        async function fntGuardar() {

            try {
                const data=new FormData(frmUsuarios);
                let resp=await fetch(base_url+"Usuario/RegistrarUsuario",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    frmUsuarios.reset();
                    tablaUsuarios.ajax.reload(null, false);
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }

//-----------------------------------fin Rgistrar usuario---------------------------------------------------------------

//-------------------------------------------Cargar datos en el modal Actualizar---------------------------------------------------------
    
$("#example1").on("click", "#editar", function(){
    var datos=tablaUsuarios.row($(this).parents("tr")).data();
  // forma de llamar a los objetos datos.nombre d ela columna
  $("#upId").val(datos.id);
  $("#upTipoDocumento").val(datos.TDocumento);
  $("#upNDocumento").val(datos.NDocumento);
  $('#upNombre').val(datos.nombre);
  $('#upApellido').val(datos.apellido);
  $("#upFechaNacimiento").val(datos.fechaNacimiento);
  $("#upUsuario").val(datos.user);
  $("#upContraseña").val(datos.password);
  $('#upTipoUsuario').val(datos.TipoUsuario);
 
 

  console.log(datos);
});



//-------------------------------------------Cargar datos en el modal Actualizar---------------------------------------------------------
//-------------------------------------------Cargar datos en el modal eliminar---------------------------------------------------------

$("#example1").on("click", "#Eliminar", function(){
var datos=tablaUsuarios.row($(this).parents("tr")).data();
// forma de llamar a los objetos datos.nombre d ela columna
$("#id").val(datos.id);

});



//-------------------------------------------Cargar datos en el modal eliminar---------------------------------------------------------

//---------------------------------------------llamar actualizar Producto---------------------------------------------------------
document.getElementById("ActualizarUsuario").addEventListener("click", fntActualizar);
//---------------------------------------------fin llamar actualizar Producto---------------------------------------------------------

//---------------------------------------------llamar eliminar Producto---------------------------------------------------------
document.getElementById("eliminarUsuario").addEventListener("click", fntEliminar);
//---------------------------------------------fin llamar eliminar Producto---------------------------------------------------------


//-------------------------------------------actualizar producto-----------------------------------------------------------
    
function fntActualizar() {
    frmActualizar=document.querySelector("#frmActualizar");
    actualizar();
   async function actualizar(){
      // id=document.querySelector("#id");
       

       try {
           const data=new FormData(frmActualizar) ;
           let resp=await fetch(base_url+"Usuario/ActualizarUsuario",{
               method: 'POST',
               mode: 'cors',
               cache: 'no-cache',
               body: data

           });
           
           json=await resp.json();
           if(json.status){
               toastr.success(json.msg);
               tablaUsuarios.ajax.reload(null, false);
               $("#modalActualizar").modal('hide');
           }else{
               toastr.error(json.msg);
               
           }               
       } catch (err) {
           
           toastr.error("Error al eliminar producto");
       }
       

   }     
   
 }


   
    

//-------------------------------------------fin actualizar producto---------------------------------------------------------
//-------------------------------------------eliminar producto---------------------------------------------------------
    
function fntEliminar() {
   
    
    frmeliminar=document.querySelector("#frmEliminar");
    eliminar();
   async function eliminar(){
       

       try {
           const data=new FormData(frmeliminar) ;
           let resp=await fetch(base_url+"Usuario/EliminarUsuario",{
               method: 'POST',
               mode: 'cors',
               cache: 'no-cache',
               body: data

           });
           
           json=await resp.json();
           if(json.status){
               toastr.success(json.msg);
               tablaUsuarios.ajax.reload(null, false);
               $("#modalEliminar").modal('hide');
           }else{
               toastr.error(json.msg);
               
           }               
       } catch (err) {
           console.log("ocurrio un error: ".err);
       }

   }    
   
 }



//-------------------------------------------fin eliminar producto---------------------------------------------------------

    


});