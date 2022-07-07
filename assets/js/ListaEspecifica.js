$(document).ready(function(){
    //--------------------------Cargar datos a la tabla----------------------------------------------------------------
        let base_url="/Sistema_Almacen/";
        tablaEspecifica=$('#example1').DataTable({ 
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
                "url": base_url+"Especifica/MostrarListaEspecifica", 
                "method": 'POST', //usamos el metodo POST
                //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                "dataSrc":""
                
            },
            
            "columns":[
                {"data": "id"},
                {"data": "detalle"},
                {"data": "codigo"},
                {"data": "fecha"},
                
                
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
            ]
        });
    
    //--------------------------fin Cargar datos a la tabla----------------------------------------------------------------
   
    //-------------------------------------------Cargar datos en el modal Actualizar---------------------------------------------------------
        
    $("#example1").on("click", "#editar", function(){
        var datos=tablaEspecifica.row($(this).parents("tr")).data();
      // forma de llamar a los objetos datos.nombre d ela columna
      $("#upId").val(datos.id);
      $("#upDetalle").val(datos.detalle);
      $("#upCodigo").val(datos.codigo);
    });
    
    
    
    //-------------------------------------------fin Cargar datos en el modal Actualizar---------------------------------------------------------
    //-------------------------------------------Cargar datos en el modal eliminar---------------------------------------------------------
    
    $("#example1").on("click", "#Eliminar", function(){
    var datos=tablaEspecifica.row($(this).parents("tr")).data();
    // forma de llamar a los objetos datos.nombre d ela columna
    $("#id").val(datos.id);
    
    
    });
    
    
    //-------------------------------------------fin Cargar datos en el modal eliminar---------------------------------------------------------
    
    //---------------------------------------------llamar actualizar Especifica---------------------------------------------------------
    document.getElementById("ActualizarEspecifica").addEventListener("click", fntActualizar);
    //---------------------------------------------fin llamar actualizar Especifica---------------------------------------------------------
    
    //---------------------------------------------llamar eliminar Especifica---------------------------------------------------------
    document.getElementById("eliminarEspecifica").addEventListener("click", fntEliminar);
    //---------------------------------------------fin llamar eliminar Especifica---------------------------------------------------------
    
    //-------------------------------------------actualizar producto-----------------------------------------------------------
        
    function fntActualizar() {
        frmActualizar=document.querySelector("#frmActualizar");
        actualizar();
       async function actualizar(){
         
    
           try {
               const data=new FormData(frmActualizar) ;
               let resp=await fetch(base_url+"Especifica/ActualizarEspecifica",{
                   method: 'POST',
                   mode: 'cors',
                   cache: 'no-cache',
                   body: data
    
               });
               
               json=await resp.json();
               if(json.status){
                   toastr.success(json.msg);
                   tablaEspecifica.ajax.reload(null, false);
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
    
    
    
    //-------------------------------------------eliminar Especifica---------------------------------------------------------
        
    function fntEliminar() {
       
        
        frmeliminar=document.querySelector("#frmEliminar");
        eliminar();
       async function eliminar(){
           
    
           try {
               const data=new FormData(frmeliminar) ;
               let resp=await fetch(base_url+"Especifica/EliminarEspecifica",{
                   method: 'POST',
                   mode: 'cors',
                   cache: 'no-cache',
                   body: data
    
               });
               
               json=await resp.json();
               if(json.status){
                   toastr.success(json.msg);
                   tablaEspecifica.ajax.reload(null, false);
                   $("#modalEliminar").modal('hide');
               }else{
                   toastr.error(json.msg);
                   
               }               
           } catch (err) {
               console.log("ocurrio un error: ".err);
           }
    
       }    
       
     }
    
    
    
    //-------------------------------------------fin eliminar Especifica---------------------------------------------------------
    
        
    
    });