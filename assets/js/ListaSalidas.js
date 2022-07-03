$(document).ready(function(){
    
    let base_url="/Sistema_Almacen/";
    tablasalidas=$('#example1').DataTable({ 
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
            "url": base_url+"salidas/MostrarListaSalidas", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            
            {"data": "detalle"},
            {"data": "area"},
            {"data": "fecha"},
            {"data": "cantidad"},
            {"data": "oc"},
            {"data": "nPecosa"},
            {"data": "especifica"},
            {"data": "devolucion"},
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });



//-----------------------eliminar ingreso --------------------------------------------------------------------------*
    document.getElementById("eliminarIngreso").addEventListener("click", fntEliminar);

    
    $("#example1").on("click", "#Eliminar", function(){
          
        var datos=tablasalidas.row($(this).parents("tr")).data();
        
        // forma de llamar a los objetos datos.nombre d ela columna
        $("#id").val(datos.idSalida);
     });
     function fntEliminar() {
        
         id=document.getElementById("id").value;
         frmeliminar=document.querySelector("#frmEliminar");
         eliminar();
        async function eliminar(){
            id=document.querySelector("#id");

            try {
                const data=new FormData(frmeliminar) ;
                let resp=await fetch(base_url+"salidas/EliminarSalida",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                
                json=await resp.json();
                if(json.status){
                    toastr.error(json.msg);
                    tablasalidas.ajax.reload(null, false);
                    $("#modalEliminar").modal('hide');
                }else{
                    toastr.error(json.msg);
                    
                }               
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }

        }        
        
      }
//---------------------------------fin funcion eliminar ---------------------------------------------------------------
   
//--------------------------------Funcion Actualizar------------------------------------------------------------------
document.getElementById("ActualizarSalida").addEventListener("click", fntActualizar);

    
    $("#example1").on("click", "#editar", function(){
        
          
        var datos=tablasalidas.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
        console.log(datos);
        $("#upId").val(datos.idSalida);
        $("#upCantidad").val(datos.cantidad);
        $('#upProducto').val(datos.ProductoID).trigger('change.select2');
        $('#upEspecifica').val(datos.EspecificaID).trigger('change.select2');
        $('#upDevolucion').val(datos.devolucion).trigger('change.select2');

        $("#upArea").val(datos.area);
        $("#upOC").val(datos.oc);
        $("#upNPecosa").val(datos.nPecosa);
        $("#CantidadA").val(datos.cantidad);
        

     });

     function fntActualizar() {
        frmActualizar=document.querySelector("#frmActualizar");
        actualizar();
       async function actualizar(){
          // id=document.querySelector("#id");
           

           try {
               const data=new FormData(frmActualizar) ;
               let resp=await fetch(base_url+"Salidas/ActualizarSalida",{
                   method: 'POST',
                   mode: 'cors',
                   cache: 'no-cache',
                   body: data
   
               });
               
               json=await resp.json();
               if(json.status){
                   toastr.success(json.msg);
                   $("#modalActualizar").modal('hide');
                   tablasalidas.ajax.reload(null, false);
                   
               }else{
                   toastr.error(json.msg);
                   
               }               
           } catch (err) {
               console.log("ocurrio un error: ".err);
           }
           

       }     
       
     }


//-------------------------------fin funcion actualizar----------------------------------------------------------------



    


});