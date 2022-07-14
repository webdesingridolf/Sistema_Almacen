$(document).ready(function(){
//------------------------------------Cargar Datos-----------------------------------------------------------------------------
    let base_url="/Sistema_Almacen/";
    tablaAlmacen=$('#example1').DataTable({ 
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
            "url": base_url+"almacenes/MostrarAlmacen", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            {"data": "id"},
            {"data": "nombre"},
            {"data": "fecha"},
            
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });
//----------------------------------------Fin Cargar Datos----------------------------------------------------------------------------------------------------------


//------------------------------------Registrar nuevo Almacen----------------------------------------------------------------
    if (document.querySelector("#frmAlmacen")) {
   
        let base_url="/Sistema_Almacen/";
        let frmAlmacen=document.querySelector("#frmAlmacen");
        frmAlmacen.onsubmit=function(e){
            e.preventDefault();
            fntGuardar();
        }
        async function fntGuardar() {
            let nombre=document.querySelector("#nombre").value;
              
            try {
                const data=new FormData(frmAlmacen);
                let resp=await fetch(base_url+"almacenes/insertarAlmacen",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    frmAlmacen.reset();
                    tablaAlmacen.ajax.reload(null, false);
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }
//--------------------------------fin Registrar Almacen----------------------------------------------------------------------------
//-------------------------------------------Cargar datos en el modal Actualizar---------------------------------------------------------
    
$("#example1").on("click", "#editar", function(){
    var datos=tablaAlmacen.row($(this).parents("tr")).data();
  // forma de llamar a los objetos datos.nombre d ela columna
  $("#upId").val(datos.id);
  $("#upNombre").val(datos.nombre);
  
});



//-------------------------------------------fin Cargar datos en el modal Actualizar---------------------------------------------------------
//-------------------------------------------Cargar datos en el modal eliminar---------------------------------------------------------

$("#example1").on("click", "#Eliminar", function(){
var datos=tablaAlmacen.row($(this).parents("tr")).data();
// forma de llamar a los objetos datos.nombre d ela columna
$("#id").val(datos.id);


});


//-------------------------------------------fin Cargar datos en el modal eliminar---------------------------------------------------------

    
//---------------------------------------------llamar actualizar Almacen---------------------------------------------------------
document.getElementById("ActualizarAlmacen").addEventListener("click", fntActualizar);
//---------------------------------------------fin llamar actualizar Almacen---------------------------------------------------------

//---------------------------------------------llamar eliminar Almacen---------------------------------------------------------
document.getElementById("eliminarAlmacen").addEventListener("click", fntEliminar);
//---------------------------------------------fin llamar eliminar Almacen---------------------------------------------------------

//-------------------------------------------actualizar producto-----------------------------------------------------------
    
function fntActualizar() {
    frmActualizar=document.querySelector("#frmActualizar");
    actualizar();
   async function actualizar(){
     

       try {
           const data=new FormData(frmActualizar) ;
           let resp=await fetch(base_url+"Almacenes/ActualizarAlmacen",{
               method: 'POST',
               mode: 'cors',
               cache: 'no-cache',
               body: data

           });
           
           json=await resp.json();
           if(json.status){
               toastr.success(json.msg);
               tablaAlmacen.ajax.reload(null, false);
               $("#modalActualizar").modal('hide');
           }else{
               toastr.error(json.msg);
               
           }               
       } catch (err) {
           
           toastr.error("Error al Actualizar");
       }
       

   }     
   
 }


   
    

//-------------------------------------------fin actualizar producto---------------------------------------------------------



//-------------------------------------------eliminar Almacen---------------------------------------------------------
    
function fntEliminar() {
   
    
    frmeliminar=document.querySelector("#frmEliminar");
    eliminar();
   async function eliminar(){
       

       try {
           const data=new FormData(frmeliminar) ;
           let resp=await fetch(base_url+"Almacenes/EliminarAlmacen",{
               method: 'POST',
               mode: 'cors',
               cache: 'no-cache',
               body: data

           });
           
           json=await resp.json();
           if(json.status){
           
               toastr.success(json.msg);
               tablaAlmacen.ajax.reload(null, false);
               $("#modalEliminar").modal('hide');
           }else{
               toastr.error(json.msg);
               
           }               
       } catch (err) {
           console.log("ocurrio un error: ".err);
       }

   }    
   
 }



//-------------------------------------------fin eliminar Almacen---------------------------------------------------------

    

});